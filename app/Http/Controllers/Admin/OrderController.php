<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        abort_unless(auth()->check() && auth()->user()->isAdmin(), 403);
    }

    public function index()
    {
        $orders = Order::with(['user', 'address'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load(['items.product', 'user', 'address']);

        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,sent,delivered,cancelled',
        ]);

        $newStatus = $request->status;
        $oldStatus = $order->status;
    
        $allowedTransitions = [
            'pending'    => ['processing', 'cancelled'],
            'processing' => ['sent', 'cancelled'],
            'sent'       => ['delivered', 'cancelled'],
            'delivered'  => [],
            'cancelled'  => [],
        ];

        if (! in_array($newStatus, $allowedTransitions[$order->status])) {
            return back()->withErrors([
                'status' => 'Transición inválida desde estado: ' . $order->status,
            ]);
        }

        // Si se cancela desde el admin, devolver stock al inventario
        if ($newStatus === 'cancelled' && $oldStatus !== 'cancelled') {
            $order->load('items.product');
            foreach ($order->items as $item) {
                $item->product->increment('stock', $item->quantity);
            }
        }

        $order->update(['status' => $newStatus]);

        return redirect()
            ->route('admin.orders.show', $order)
            ->with('status', 'Estado actualizado correctamente.');
    }

    public function cancel(Order $order)
    {
        if (! in_array($order->status, ['pending', 'processing'])) {
            return back()->withErrors([
                'status' => 'No se puede cancelar un pedido en estado: ' . $order->status,
            ]);
        }

        // RESTAURAR STOCK
        $order->load('items.product');
        foreach ($order->items as $item) {
            $item->product->increment('stock', $item->quantity);
        }

        $order->update(['status' => 'cancelled']);

        return redirect()
            ->route('admin.orders.show', $order)
            ->with('status', 'Pedido cancelado correctamente.');
    }
}

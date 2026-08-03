<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Wishlist;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('clients.orders.index', compact('orders'));
    }

    public function create()
    {
        $wishlist = Wishlist::where('user_id', Auth::id())
            ->with('product')
            ->get();

        $addresses = Auth::user()->addresses;

        return view('clients.orders.create', compact('wishlist', 'addresses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:addresses,id',
        ]);

        $wishlist = Wishlist::where('user_id', Auth::id())
            ->with('product')
            ->get();

        if ($wishlist->isEmpty()) {
            return back()->withErrors('El carrito está vacío.');
        }

        $order = Order::create([
            'user_id' => Auth::id(),
            'address_id' => $request->address_id,
            'status' => 'pending',
            'total' => 0,
        ]);

        $total = 0;

        foreach ($wishlist as $item) {
            $subtotal = $item->product->price * $item->quantity;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'unit_price' => $item->product->price,
                'subtotal' => $subtotal,
            ]);

            $total += $subtotal;
        }

        $order->update(['total' => $total]);

        Wishlist::where('user_id', Auth::id())->delete();

        return redirect()->route('orders.show', $order->id);
    }

    public function show(Order $order)
    {
        abort_unless($order->user_id === Auth::id(), 403);

        $order->load('items.product', 'address');

        $reviewedProductIds = Review::where('user_id', Auth::id())
            ->whereIn('product_id', $order->items->pluck('product_id'))
            ->pluck('product_id')
            ->toArray();

        return view('clients.orders.show', compact('order', 'reviewedProductIds'));
    }

    public function cancel(Order $order)
    {
        abort_unless($order->user_id === Auth::id(), 403);

        if ($order->status !== 'pending') {
            return back()->withErrors('Solo se pueden cancelar pedidos pendientes.');
        }

        $order->update(['status' => 'cancelled']);

        return redirect()->route('orders.show', $order->id);
    }
}

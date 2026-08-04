<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class OrderApiController extends Controller
{
    public function index(): JsonResponse
    {
        $authenticatedUser = Auth::user();

        if (! $authenticatedUser instanceof User) {
            $authenticatedUser = User::find(Auth::id());
        }

        if (! $authenticatedUser) {
            return response()->json(['message' => 'No autenticado.'], 401);
        }

        $orders = $authenticatedUser
            ->orders()
            ->with('address')
            ->latest()
            ->get()
            ->map(function ($order) {
                return [
                    'id' => $order->id,
                    'status' => $order->status,
                    'total' => (float) $order->total,
                    'created_at' => $order->created_at->toISOString(),
                    'address' => $order->address ? [
                        'city' => $order->address->city,
                        'street' => $order->address->street,
                    ] : null,
                ];
            });

        return response()->json($orders, 200);
    }
}

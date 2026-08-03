@extends('layouts.client')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Pedido #{{ $order->id }}</h1>

    <div class="card mb-4">
        <div class="card-body">
            <p class="mb-1"><strong>Total:</strong> ${{ number_format($order->total, 2, ',', '.') }}</p>
            <p class="mb-1"><strong>Estado:</strong> <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span></p>
            <p class="mb-0"><strong>Dirección:</strong> {{ $order->address->street }}, {{ $order->address->city }}</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm wishlist-summary p-4" style="max-width: 640px;">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="h4 mb-1">Productos</h1>
            </div>
        </div>

        <div class="mb-4">
            <h3 class="h6 mb-3">Resumen de productos</h3>
            <div class="list-group list-group-flush rounded-4 overflow-hidden">
                @foreach ($order->items as $item)
                <div class="list-group-item px-0 py-3 d-flex justify-content-between align-items-center border-0 border-bottom">
                    <div>
                        <div class="fw-semibold">{{ $item->quantity }}x {{ $item->product->name }}</div>
                        <small class="text-muted">${{ number_format($item->product->price, 2, ',', '.') }} c/u</small>
                    </div>
                    <div class="text-end">
                        <div class="fw-semibold">${{ number_format($item->product->price * $item->quantity, 2, ',', '.') }}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div>
            @if ($order->status === 'pending')
            <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="mt-3">
                @csrf
                @method('PUT')
                <button class="btn btn-outline-danger">Cancelar Pedido</button>
            </form>
            @endif

            <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary mt-3">Volver a mis pedidos</a>
        </div>

    </div>
</div>
@endsection

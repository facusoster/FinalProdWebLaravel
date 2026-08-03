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

    <h3 class="mb-3">Productos</h3>

    <div class="table-responsive">
        <table class="table table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    @if($order->status === 'completed')
                        <th>Reseña</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format($item->subtotal, 2, ',', '.') }}</td>
                    @if($order->status === 'completed')
                        <td>
                            @if(in_array($item->product_id, $reviewedProductIds))
                                <span class="badge bg-success">✓ Reseñado</span>
                            @else
                                <a href="{{ route('reviews.create', $item->product_id) }}" class="btn btn-sm btn-outline-primary">Dejar reseña</a>
                            @endif
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($order->status === 'pending')
    <form action="{{ route('orders.cancel', $order->id) }}" method="POST" class="mt-3">
        @csrf
        @method('PUT')
        <button class="btn btn-outline-danger">Cancelar Pedido</button>
    </form>
    @endif

    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary mt-3">Volver a mis pedidos</a>
</div>
@endsection

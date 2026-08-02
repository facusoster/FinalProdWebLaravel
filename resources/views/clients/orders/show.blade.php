@extends('layouts.client')

@section('content')
<h1>Pedido #{{ $order->id }}</h1>

<p><strong>Total:</strong> ${{ $order->total }}</p>
<p><strong>Estado:</strong> {{ $order->status }}</p>

<h3>Items del pedido</h3>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($order->items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ $item->subtotal }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@if ($order->status === 'pending')
<form action="{{ route('orders.cancel', $order->id) }}" method="POST">
    @csrf
    @method('PUT')
    <button>Cancelar Pedido</button>
</form>
@endif

@endsection

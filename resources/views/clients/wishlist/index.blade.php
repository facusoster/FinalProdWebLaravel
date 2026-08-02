@extends('layouts.client')

@section('content')
<h1>Carrito</h1>

@if ($items->isEmpty())
    <p>Tu carrito está vacío.</p>
@else
<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Subtotal</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($items as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ $item->product->price }}</td>
            <td>${{ $item->product->price * $item->quantity }}</td>
            <td>
                <form action="{{ route('wishlist.remove', $item->product_id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Quitar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('orders.create') }}">Confirmar Pedido</a>
@endif
@endsection

@extends('layouts.admin')

@section('content')
<h1>Confirmar Pedido</h1>

<h3>Carrito</h3>

<table>
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($wishlist as $item)
        <tr>
            <td>{{ $item->product->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ $item->product->price * $item->quantity }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<h3>Dirección</h3>

<form action="{{ route('orders.store') }}" method="POST">
    @csrf

    <select name="address_id">
        @foreach ($addresses as $address)
        <option value="{{ $address->id }}">{{ $address->street }}</option>
        @endforeach
    </select>

    <button>Crear Pedido</button>
</form>
@endsection

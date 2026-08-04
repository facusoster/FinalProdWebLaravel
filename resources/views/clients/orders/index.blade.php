@extends('layouts.client')

@section('content')
<h1>Mis Pedidos</h1>

@if ($orders->isEmpty())
    <p>No tenés pedidos todavía.</p>
@else
<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Estado</th>
            <th>Total</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->status }}</td>
            <td>${{ $order->total }}</td>
            <td>
                <a href="{{ route('orders.show', $order->id) }}">Ver</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection

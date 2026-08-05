@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Pedidos</h1>
</div>

<div class="table-responsive table-wrapper">
    <table class="table table-striped table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Cliente</th>
                <th>Dirección</th>
                <th>Total</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>

        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->address->street }}</td>
                <td>${{ $order->total }}</td>
                <td>
                    @php
                        $badges = [
                            'pending'    => 'bg-warning text-dark',
                            'processing' => 'bg-info text-dark',
                            'sent'       => 'bg-primary',
                            'delivered'  => 'bg-success',
                            'cancelled'  => 'bg-danger',
                        ];
                    @endphp
                    <span class="badge {{ $badges[$order->status] ?? 'bg-secondary' }}">
                        {{ ucfirst($order->status) }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('admin.orders.show', $order) }}" class="btn btn-sm btn-primary-green">
                        Ver
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $orders->links() }}
@endsection

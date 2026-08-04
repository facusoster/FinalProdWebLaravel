@extends('layouts.client')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Mis Pedidos</h2>
    </div>

    @if ($orders->isEmpty())
        <div class="alert alert-info">No tenés pedidos todavía.</div>
    @else
        <div class="row">
            @foreach($orders as $order)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title"><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</h5>
                            <p class="card-text mb-1">
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
                            </p>
                            <p class="card-text text-muted mb-1">
                                Total: ${{ $order->total }}
                            </p>
                            <p class="card-text text-muted">
                                {{ $order->country }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
        
@endsection

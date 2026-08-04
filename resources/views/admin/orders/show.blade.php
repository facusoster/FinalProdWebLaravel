@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Pedido #{{ $order->id }}</h1>

    <div class="row">
        <div class="col-lg-8">
            {{-- Detalle del pedido --}}
            <div class="card mb-4">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Cliente:</strong> {{ $order->user->name }}</p>
                            <p class="mb-1"><strong>Email:</strong> {{ $order->user->email }}</p>
                            <p class="mb-0"><strong>Dirección:</strong> {{ $order->address->street }}, {{ $order->address->city }}, {{ $order->address->province }}</p>
                        </div>
                        <div class="col-md-6">
                            <p class="mb-1"><strong>Total:</strong> ${{ number_format($order->total, 2, ',', '.') }}</p>
                            <p class="mb-1">
                                <strong>Estado:</strong>
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
                            <p class="mb-0"><strong>Fecha:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Items --}}
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Items del pedido</h5>
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th class="text-end">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->items as $item)
                            <tr>
                                <td>{{ $item->product->name }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td class="text-end">${{ number_format($item->subtotal, 2, ',', '.') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Sidebar: acciones --}}
        <div class="col-lg-4">
            {{-- Cambiar estado --}}
            @php
                $allowedTransitions = [
                    'pending'    => ['processing' => 'Procesando', 'cancelled' => 'Cancelado'],
                    'processing' => ['sent' => 'Enviado', 'cancelled' => 'Cancelado'],
                    'sent'       => ['delivered' => 'Entregado', 'cancelled' => 'Cancelado'],
                    'delivered'  => [],
                    'cancelled'  => [],
                ];
                $nextStates = $allowedTransitions[$order->status] ?? [];
            @endphp

            @if(count($nextStates))
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="mb-0">Actualizar estado</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Nuevo estado</label>
                            <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="">Seleccionar...</option>
                                @foreach($nextStates as $value => $label)
                                    <option value="{{ $value }}">{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Guardar cambio</button>
                    </form>
                </div>
            </div>
            @else
            <div class="alert alert-secondary">
                Este pedido ya no admite cambios de estado.
            </div>
            @endif

            {{-- Cancelar directo (solo si aplica) --}}
            @if(in_array($order->status, ['pending', 'processing']))
            <div class="card border-danger">
                <div class="card-body">
                    <h6 class="text-danger">Cancelar pedido</h6>
                    <p class="small text-muted mb-3">Esta acción cambiará el estado a Cancelado.</p>
                    <form action="{{ route('admin.orders.cancel', $order) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-danger w-100" onclick="return confirm('¿Cancelar este pedido?')">Cancelar ahora</button>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>

    <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-secondary mt-4">← Volver a pedidos</a>
</div>
@endsection

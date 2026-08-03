@extends('layouts.client')

@section('content')
@if ($wishlist->isEmpty())
    <div class="card border-0 shadow-sm p-4">
        <div class="card-body text-center">
            <h2 class="h5">Tu carrito está vacío</h2>
            <p class="text-muted mb-0">Agrega productos desde el catálogo para verlos aquí.</p>
            <a href="{{ route('wishlist.index') }}" class="btn btn-outline-secondary mt-3">Volver al carrito</a>
        </div>
    </div>
@else
    <div class="card border-0 shadow-sm wishlist-summary p-4 mx-auto" style="max-width: 640px;">
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h1 class="h4 mb-1">Resumen de Pedido</h1>
                <p class="text-muted mb-0">Confirma tu dirección y revisa el total antes de crear el pedido.</p>
            </div>
        </div>

        <div class="mb-4">
            <h3 class="h6 mb-3">Resumen de productos</h3>
            <div class="list-group list-group-flush rounded-4 overflow-hidden">
                @foreach ($wishlist as $item)
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

        <div class="border-top pt-4 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-muted">Total</span>
                <span class="total-amount">${{ number_format($wishlist->sum(fn($item) => $item->product->price * $item->quantity), 2, ',', '.') }}</span>
            </div>
        </div>

        <div>
            <h3 class="h6 mb-3">Dirección de envío</h3>
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <select name="address_id" class="form-select rounded-pill border-0 shadow-sm">
                        @foreach ($addresses as $address)
                            <option value="{{ $address->id }}">
                                {{ $address->street }} {{ $address->number ?? '' }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-green w-100">Crear Pedido</button>
            </form>
        </div>
    </div>
@endif
@endsection

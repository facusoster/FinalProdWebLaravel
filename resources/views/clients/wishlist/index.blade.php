@extends('layouts.client')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h3 mb-1">Carrito</h1>
        <p class="text-muted mb-0">Revisa tus productos seleccionados antes de confirmar tu pedido.</p>
    </div>
</div>

@if ($items->isEmpty())
    <div class="card border-0 shadow-sm p-4">
        <div class="card-body text-center">
            <h2 class="h5">Tu carrito está vacío</h2>
            <p class="text-muted mb-0">Agrega productos desde el catálogo para verlos aquí.</p>
        </div>
    </div>
@else
<div class="row gx-4 gy-4">
    <div class="col-12 col-xl-8">
        <div class="card border-0 shadow-sm wishlist-card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table wishlist-table align-middle mb-0">
                        <thead class="table-light">
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
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        @if ($item->product->image_url)
                                            <img src="{{ asset('storage/' . $item->product->image_url) }}" alt="{{ $item->product->name }}" class="product-thumb">
                                        @else
                                            <div class="product-thumb bg-secondary bg-opacity-25 d-flex align-items-center justify-content-center text-muted">Sin imagen</div>
                                        @endif
                                        <div>
                                            <div class="fw-bold">{{ $item->product->name }}</div>
                                            @if ($item->product->category)
                                                <small class="text-muted">{{ $item->product->category->name }}</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>${{ number_format($item->product->price, 2, ',', '.') }}</td>
                                <td>${{ number_format($item->product->price * $item->quantity, 2, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('wishlist.remove', $item->product_id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-remove">Quitar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <aside class="col-12 col-xl-4">
        <div class="card border-0 shadow-sm wishlist-summary p-4 h-100">
            <h4 class="mb-3">Resumen de compra</h4>
            <dl class="row mb-4">
                <dt class="col-6 text-muted">Items</dt>
                <dd class="col-6 text-end">{{ $items->sum('quantity') }}</dd>

                <dt class="col-6 text-muted">Total parcial</dt>
                <dd class="col-6 text-end">${{ number_format($items->sum(fn($item) => $item->product->price * $item->quantity), 2, ',', '.') }}</dd>
            </dl>

            <div class="border-top pt-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Total</span>
                    <span class="total-amount">${{ number_format($items->sum(fn($item) => $item->product->price * $item->quantity), 2, ',', '.') }}</span>
                </div>
                <a href="{{ route('orders.create') }}" class="btn btn-green w-100">Confirmar Pedido</a>
            </div>
        </div>
    </aside>
</div>
@endif
@endsection

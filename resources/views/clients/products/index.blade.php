@extends('layouts.client')

@section('content')
<div class="mb-4 rounded-4 overflow-hidden shadow-sm" style="background: url('{{ asset('images/banners/banner-panaderia.webp') }}') center/cover no-repeat; min-height: 390px;">
    <div class="h-100 d-flex align-items-center justify-content-center text-white" style="background: rgba(0,0,0,0.35);">
        <div class="text-center p-4">
        </div>
    </div>
</div>

<div class="row g-4">
    <aside class="col-lg-3">
        <div class="card border-0 shadow-sm h-100 sidebar-card">
            <div class="card-body">
                <h5 class="mb-3 sidebar-title">Categorías</h5>
                <div class="list-group list-group-flush">
                    <a href="{{ route('client.products.index') }}" class="list-group-item list-group-item-action sidebar-category-item {{ empty($selectedCategoryId) ? 'active' : '' }}">
                        Todas
                    </a>
                    @foreach ($categories as $category)
                        <a href="{{ route('client.products.index', ['category' => $category->id]) }}" class="list-group-item list-group-item-action sidebar-category-item {{ $selectedCategoryId == $category->id ? 'active' : '' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </aside>

    <section class="col-lg-9">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h2 class="h4 mb-1">Productos</h2>
                @if ($selectedCategoryId)
                    @php $activeCategory = $categories->firstWhere('id', $selectedCategoryId); @endphp
                    <p class="text-muted mb-0">Mostrando: {{ $activeCategory ? $activeCategory->name : 'Categoría seleccionada' }}</p>
                @else
                    <p class="text-muted mb-0">Mostrando todos los productos.</p>
                @endif
            </div>

            @if ($selectedCategoryId)
                <a href="{{ route('client.products.index') }}" class="btn btn-outline-secondary btn-sm">Ver todos</a>
            @endif
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
            @forelse ($products as $product)
                <div class="col">
                    <div class="card h-100 border-0 shadow-sm">
                        @if ($product->image_url)
                            <img src="{{ asset('storage/' . $product->image_url) }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-secondary bg-opacity-10 d-flex align-items-center justify-content-center" style="height: 200px;">
                                <span class="text-muted">Sin imagen</span>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="text-muted mb-3">${{ number_format($product->price, 2, ',', '.') }}</p>
                            <form action="{{ route('wishlist.add', $product->id) }}" method="POST" class="mt-auto wishlist-add-form">
                                @csrf
                                <button type="submit" class="btn btn-green w-100">Agregar al carrito</button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info">No hay productos para esta categoría.</div>
                </div>
            @endforelse
        </div>
    </section>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const feedback = document.getElementById('wishlist-toast');

        function showFeedback(message, type = 'success') {
            feedback.textContent = message;
            feedback.classList.remove('d-none', 'toast-success', 'toast-danger');
            feedback.classList.add(type === 'danger' ? 'toast-danger' : 'toast-success', 'show');

            setTimeout(() => {
                feedback.classList.add('d-none');
                feedback.classList.remove('show');
            }, 3000);
        }

        document.querySelectorAll('.wishlist-add-form').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                const url = form.action;
                const formData = new FormData(form);

                fetch(url, {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                    body: formData,
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showFeedback(data.message || 'Producto agregado al carrito');
                    } else {
                        showFeedback(data.message || 'No se pudo agregar el producto', 'danger');
                    }
                })
                .catch(() => {
                    showFeedback('Error al agregar el producto', 'danger');
                });
            });
        });
    });
</script>

<div id="wishlist-toast" class="wishlist-toast d-none" role="status" aria-live="polite" aria-atomic="true"></div>
@endsection

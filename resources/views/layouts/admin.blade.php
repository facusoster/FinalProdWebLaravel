<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin - Rincón del Pan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}?v={{ filemtime(public_path('css/styles.css')) }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('products.index') }}">Rincón del Pan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categorías</a></li>
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ route('admin.orders.index') }}">
                            Pedidos
                            @php
                            $pendingOrders = \App\Models\Order::where('status', 'pending')->count();
                            @endphp
                            @if($pendingOrders > 0)
                            <span class="badge bg-danger rounded-pill ms-1" style="font-size: 0.65rem; padding: 0.35em 0.6em;">
                                {{ $pendingOrders }}
                            </span>
                            @endif
                        </a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.reviews.index') }}">Reseñas</a></li>
                </ul>

                <form class="d-flex align-items-center" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-primary-custom" type="submit">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <hr class="my-3">

        {{-- Banner de pedidos pendientes (visible en todas las páginas del admin) --}}
        @php
        $pendingOrders = \App\Models\Order::where('status', 'pending')->count();
        @endphp

        @if($pendingOrders > 0)
        <div class="alert alert-warning alert-dismissible fade show shadow-sm border-0 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <span class="me-2">🔔</span>
                <div>
                    <strong>¡Tenés pedidos pendientes!</strong>
                    Hay <strong>{{ $pendingOrders }}</strong> pedido{{ $pendingOrders > 1 ? 's' : '' }} esperando ser procesado{{ $pendingOrders > 1 ? 's' : '' }}.
                    <a href="{{ route('admin.orders.index') }}" class="alert-link fw-bold ms-1">Ver pedidos →</a>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

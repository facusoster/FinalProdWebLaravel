<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Cliente - Rincón del Pan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}?v={{ filemtime(public_path('css/styles.css')) }}" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg fixed-top navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="{{ route('client.products.index') }}">Rincón del Pan</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#clientNavbar" aria-controls="clientNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="clientNavbar">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="{{ route('client.products.index') }}">Productos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('orders.index') }}">Mis Pedidos</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('addresses.index') }}">Mis Direcciones</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('reviews.index') }}">Mis Reseñas</a></li>
                </ul>

                <div class="d-flex align-items-center">
                    <a class="nav-link d-flex align-items-center me-3" href="{{ route('wishlist.index') }}" title="Carrito">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .485.379L2.89 5H14.5a.5.5 0 0 1 .49.598l-1.5 6A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L1.01 2H.5a.5.5 0 0 1-.5-.5zm3.14 4l1.25 5h7.22l1.2-4.8H3.14z"/>
                            <path d="M5.5 13a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm8 1a1 1 0 1 0-2 0 1 1 0 0 0 2 0z"/>
                        </svg>
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-flex align-items-center ms-auto">
                        @csrf
                        <button class="btn btn-sm btn-green" type="submit">Cerrar sesión</button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <hr class="my-3">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

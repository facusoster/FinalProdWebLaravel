<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Cliente - Sweet Store</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        nav {
            margin-bottom: 20px;
        }

        nav a {
            margin-right: 15px;
            text-decoration: none;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
        }

        img {
            border-radius: 4px;
        }

        .logout-btn {
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('client.products.index') }}">Productos</a>
        <a href="{{ route('wishlist.index') }}">Carrito</a>
        <a href="{{ route('orders.index') }}">Mis Pedidos</a>

        <!-- Logout -->
        <form action="{{ route('logout') }}" method="POST" style="display:inline;">
            @csrf
            <button class="logout-btn" style="background:none;border:none;cursor:pointer;">
                Cerrar sesión
            </button>
        </form>
    </nav>

    <hr>

    @yield('content')

</body>
</html>

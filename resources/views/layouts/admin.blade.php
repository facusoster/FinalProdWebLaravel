<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Sweet Store</title>

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
    </style>
</head>

<body>

    <nav>
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <a href="{{ route('products.index') }}">Productos</a>
        <a href="{{ route('categories.index') }}">Categorías</a>
    </nav>

    <hr>

    @yield('content')

</body>
</html>

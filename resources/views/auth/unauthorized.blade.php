<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso no autorizado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body class="auth-page">
    <div class="auth-card">
        <div class="card-body text-center p-5">
            <h2 class="mb-3">Sin acceso</h2>
            <p class="text-muted mb-4">Debes iniciar sesión para ver esta sección.</p>
            <a href="{{ route('login') }}" class="btn btn-primary-custom">Iniciar sesión</a>
        </div>
    </div>
</body>
</html>

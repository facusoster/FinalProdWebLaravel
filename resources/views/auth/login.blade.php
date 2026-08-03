<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bienvenido a Rincón del Pan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body class="auth-page">
    <div class="auth-card">
        <div class="card-header text-center">
            <h1 class="h4 mb-2">Bienvenido a Rincón del Pan</h1>
            <p class="mb-0 opacity-75">Ingresa tus datos para iniciar sesión y seguir explorando el sabor del día.</p>
        </div>
        <div class="card-body">
            <form method="POST" action="/login" novalidate>
                @csrf

                <div class="mb-3">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="ejemplo@correo.com" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Contraseña</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger py-2 px-3 mt-3">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary-custom btn-lg">Ingresar</button>
                </div>

                <div class="text-center mt-4">
                    <p class="mb-1 text-muted">Admin: admin@sweetstore.test - password123</p>
                    <p class="mb-1 text-muted">Cliente: maria.gonzalez@sweetstore.test - password123</p>
                    <p class="mb-1 text-muted">¿No tenés cuenta aún?</p>
                    <a href="{{ route('register') }}" class="link-secondary fw-semibold">Regístrate aquí</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro | Rincón del Pan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/auth.css') }}" rel="stylesheet">
</head>
<body class="auth-page">
    <div class="auth-card">
        <div class="card-header text-center">
            <h1 class="h4 mb-2">Bienvenido a Rincón del Pan</h1>
            <p class="mb-0 opacity-75">Crea tu cuenta para comenzar a explorar nuestros productos y hacer pedidos.</p>
        </div>
        <div class="card-body">
            <form method="POST" action="/register" novalidate>
                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre completo" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

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

                <div class="mb-3">
                    <label class="form-label">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger py-2 px-3 mt-3">
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="d-grid mt-4">
                    <button type="submit" class="btn btn-primary-custom btn-lg">Registrarme</button>
                </div>

                <div class="text-center mt-4">
                    <p class="mb-1 text-muted">¿Ya tenés cuenta?</p>
                    <a href="{{ route('login') }}" class="link-secondary fw-semibold">Ingresar aquí</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

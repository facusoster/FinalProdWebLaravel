<form method="POST" action="/register">
    @csrf

    <input type="text" name="name" placeholder="Nombre">

    <input type="email" name="email" placeholder="Email">

    <input type="password" name="password" placeholder="Contraseña">

    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña">

    <button type="submit">Registrarme</button>
</form>

@if ($errors->any())
    <p>{{ $errors->first() }}</p>
@endif

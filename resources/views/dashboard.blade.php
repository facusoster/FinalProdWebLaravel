<h1>Dashboard del Cliente</h1>
<p>Bienvenido {{ auth()->user()->name }}</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

<h1>Panel de Administración</h1>
<p>Bienvenido {{ auth()->user()->name }} (Admin)</p>

<form method="POST" action="/logout">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

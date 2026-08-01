<h1>Crear Categoría</h1>

<form method="POST" action="{{ route('categories.store') }}">
    @csrf

    <input type="text" name="name" placeholder="Nombre">

    <textarea name="description" placeholder="Descripción"></textarea>

    <button type="submit">Guardar</button>
</form>

@if ($errors->any())
    <p>{{ $errors->first() }}</p>
@endif

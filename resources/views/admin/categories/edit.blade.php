<h1>Editar Categoría</h1>

<form method="POST" action="{{ route('categories.update', $category) }}">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $category->name }}">

    <textarea name="description">{{ $category->description }}</textarea>

    <button type="submit">Actualizar</button>
</form>

@if ($errors->any())
    <p>{{ $errors->first() }}</p>
@endif

<h1>Categorías</h1>

<a href="{{ route('categories.create') }}">Crear categoría</a>

<ul>
@foreach ($categories as $category)
    <li>
        <strong>{{ $category->name }}</strong><br>
        {{ $category->description }}

        <a href="{{ route('categories.edit', $category) }}">Editar</a>

        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Eliminar</button>
        </form>
    </li>
@endforeach
</ul>

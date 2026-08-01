@extends('layouts.admin')

@section('content')
<h1>Productos</h1>

<a href="{{ route('products.create') }}">Crear Producto</a>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Categorías</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>

            <td>
                @forelse ($product->categories as $cat)
                    {{ $cat->name }}<br>
                @empty
                    <em>Sin categorías</em>
                @endforelse
            </td>

            <td>${{ $product->price }}</td>
            <td>{{ $product->stock }}</td>

            <td>
                @if($product->image_url)
                    <img src="{{ asset('storage/' . $product->image_url) }}" width="80">
                @endif
            </td>

            <td>
                <a href="{{ route('products.edit', $product->id) }}">Editar</a>

                <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button>Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $products->links() }}
@endsection

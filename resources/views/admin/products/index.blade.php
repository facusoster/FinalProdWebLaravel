@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Productos</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary-custom">Crear Producto</a>
</div>

<div class="table-responsive table-wrapper">
    <table class="table table-striped table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
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
                    @if ($product->category)
                        <span class="badge rounded-pill badge-category">{{ $product->category->name }}</span>
                    @else
                        <em>Sin categoría</em>
                    @endif
                </td>

                <td>${{ $product->price }}</td>
                <td>{{ $product->stock }}</td>

                <td>
                    @if($product->image_url)
                        <img src="{{ asset('storage/' . $product->image_url) }}" width="80" class="img-thumbnail img-thumb">
                    @endif
                </td>

                <td class="text-nowrap">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-outline-primary me-1">Editar</a>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('Eliminar este producto?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>

@endsection

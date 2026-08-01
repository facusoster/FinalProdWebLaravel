@extends('layouts.admin')

@section('content')
<h1>Editar Producto</h1>

<form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Nombre</label>
    <input type="text" name="name" value="{{ $product->name }}">

    <label>Descripción</label>
    <textarea name="description">{{ $product->description }}</textarea>

    <label>Precio</label>
    <input type="number" step="0.01" name="price" value="{{ $product->price }}">

    <label>Stock</label>
    <input type="number" name="stock" value="{{ $product->stock }}">

    <label>Imagen</label>
    <input type="file" name="image">

    @if($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" width="80">
    @endif

    <label>Categoría</label>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected($product->category_id == $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>

    <button>Actualizar</button>
</form>
@endsection

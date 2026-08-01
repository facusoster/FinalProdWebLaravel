@extends('layouts.admin')

@section('content')
<h1>Crear Producto</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nombre</label>
    <input type="text" name="name">

    <label>Descripción</label>
    <textarea name="description"></textarea>

    <label>Precio</label>
    <input type="number" step="0.01" name="price">

    <label>Stock</label>
    <input type="number" name="stock">

    <label>Imagen</label>
    <input type="file" name="image">

    <label>Categoría</label>
    <select name="category_id">
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>

    <button>Guardar</button>
</form>
@endsection

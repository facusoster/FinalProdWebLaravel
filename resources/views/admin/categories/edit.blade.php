@extends('layouts.admin')

@section('content')
<h1>Editar Categoría</h1>

<form action="{{ route('categories.update', $category->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre:</label>
    <input type="text" name="name" value="{{ $category->name }}">

    <button>Actualizar</button>
</form>
@endsection

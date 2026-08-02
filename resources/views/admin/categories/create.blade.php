@extends('layouts.admin')

@section('content')
<h1>Crear Categoría</h1>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <label>Nombre:</label>
    <input type="text" name="name">

    <button>Guardar</button>
</form>
@endsection

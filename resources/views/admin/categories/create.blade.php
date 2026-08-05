@extends('layouts.admin')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Crear Categoría</h2>

    <div class="card col-12 col-xl-4">
        <div class="card-body">
            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" name="name" id="name" class="bg-transparent border border-secondary-subtle form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea name="description" id="description" class="bg-transparent border border-secondary-subtle form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary-green">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-lg-8">
        <div class="card shadow-sm rounded-4 border-0">
            <div class="card-body p-4 p-md-5" style="background: linear-gradient(180deg, rgba(239,230,218,0.95), rgba(255,255,255,0.95));">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h1 class="h4 mb-1">Editar Producto</h1>
                        <p class="text-muted mb-0">Actualiza los datos del producto existente</p>
                    </div>
                    <span class="badge rounded-pill" style="background: var(--brown-300); color: var(--brown-900);">Edición</span>
                </div>

                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror rounded-pill border-0 shadow-sm" placeholder="Nombre del producto">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror rounded-3 border-0 shadow-sm" rows="4" placeholder="Descripción breve del producto">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Precio</label>
                            <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" class="form-control @error('price') is-invalid @enderror rounded-pill border-0 shadow-sm" placeholder="0.00">
                            @error('price')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Stock</label>
                            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control @error('stock') is-invalid @enderror rounded-pill border-0 shadow-sm" placeholder="Cantidad disponible">
                            @error('stock')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mt-3">
                        <div class="col-md-6">
                            <label class="form-label">Imagen</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror rounded-pill border-0 shadow-sm">
                            @error('image')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror

                            @if($product->image_url)
                                <div class="mt-3">
                                    <p class="mb-1 text-muted">Imagen actual:</p>
                                    <img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" class="img-fluid rounded" style="max-width: 180px;">
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Categoría</label>
                            <select name="category_id" class="form-select rounded-pill border-0 shadow-sm @error('category_id') is-invalid @enderror">
                                <option value="">Selecciona una categoría</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary-custom px-4 py-2">Actualizar producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.client')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Dejar reseña: {{ $product->name }}</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('reviews.store', $product) }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Calificación</label>
                    <select name="rating" class="form-select border border-secondary-subtle @error('rating') is-invalid @enderror" required>
                        <option value="">Seleccionar...</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" @selected(old('rating') == $i)>{{ $i }} estrella{{ $i > 1 ? 's' : '' }}</option>
                        @endfor
                    </select>
                    @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="mb-3">
                    <label class=" form-label">Comentario</label>
                    <textarea name="comment" rows="4" class="bg-transparent border border-secondary-subtle form-control @error('comment') is-invalid @enderror" required>{{ old('comment') }}</textarea>
                    @error('comment')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('orders.index') }}" class="btn btn-outline-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary-green">Publicar reseña</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

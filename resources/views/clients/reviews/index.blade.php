@extends('layouts.client')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Mis Reseñas</h2>

    @if($reviews->isEmpty())
        <div class="alert alert-info">No has publicado reseñas todavía.</div>
    @else
        <div class="row">
            @foreach($reviews as $review)
                <div class="col-md-6 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $review->product->name }}</h5>
                            <p class="text-warning mb-2">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating) ⭐ @endif
                                @endfor
                            </p>
                            <p class="card-text">{{ $review->comment }}</p>
                            <p class="text-muted small">{{ $review->created_at->format('d/m/Y') }}</p>
                        </div>
                        <div class="card-footer">
                            <form action="{{ route('reviews.destroy', $review) }}" method="POST" onsubmit="return confirm('¿Eliminar esta reseña?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

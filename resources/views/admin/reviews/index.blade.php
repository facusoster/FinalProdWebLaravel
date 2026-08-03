@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Reseñas</h1>
</div>

<div class="table-responsive table-wrapper">
    <table class="table table-striped table-hover align-middle mb-0">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Calificación</th>
                <th>Comentario</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
            <tr>
                <td>{{ $review->id }}</td>
                <td>{{ $review->user->name }}</td>
                <td>{{ $review->product->name }}</td>
                <td>
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating) ⭐ @endif
                    @endfor
                </td>
                <td>{{ Str::limit($review->comment, 60) }}</td>
                <td>{{ $review->created_at->format('d/m/Y') }}</td>
                <td>
                    <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger" onclick="return confirm('¿Eliminar esta reseña?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-3">
        {{ $reviews->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection

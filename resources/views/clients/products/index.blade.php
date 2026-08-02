@extends('layouts.client')

@section('content')
<h1>Productos</h1>

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>${{ $product->price }}</td>
            <td>
                <form action="{{ route('wishlist.add', $product->id) }}" method="POST">
                    @csrf
                    <button>Agregar al carrito</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection

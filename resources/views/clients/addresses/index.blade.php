@extends('layouts.client')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Mis Direcciones</h2>
        <a href="{{ route('addresses.create') }}" class="btn btn-primary-green">+ Nueva dirección</a>
    </div>

    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif

    @if($addresses->isEmpty())
        <div class="alert alert-info">No tenés direcciones registradas.</div>
    @else
        <div class="row">
            @foreach($addresses as $address)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $address->street }}</h5>
                            <p class="card-text mb-1">
                                {{ $address->city }}, {{ $address->province }}
                            </p>
                            <p class="card-text text-muted mb-1">
                                CP: {{ $address->postal_code }}
                            </p>
                            <p class="card-text text-muted">
                                {{ $address->country }}
                            </p>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <a href="{{ route('addresses.edit', $address) }}" class="btn btn-sm btn-outline-secondary">Editar</a>
                            <form action="{{ route('addresses.destroy', $address) }}" method="POST" onsubmit="return confirm('¿Eliminar esta dirección?');">
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

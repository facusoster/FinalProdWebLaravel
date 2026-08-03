@extends('layouts.client')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">Editar dirección</h2>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('addresses.update', $address) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="street" class="form-label">Calle y número</label>
                    <input type="text" name="street" id="street" class="form-control @error('street') is-invalid @enderror" value="{{ old('street', $address->street) }}" required>
                    @error('street')<div class="invalid-feedback">{{ $message }}</div>@enderror
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="city" class="form-label">Ciudad</label>
                        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" value="{{ old('city', $address->city) }}" required>
                        @error('city')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="province" class="form-label">Provincia</label>
                        <input type="text" name="province" id="province" class="form-control @error('province') is-invalid @enderror" value="{{ old('province', $address->province) }}" required>
                        @error('province')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="postal_code" class="form-label">Código postal</label>
                        <input type="text" name="postal_code" id="postal_code" class="form-control @error('postal_code') is-invalid @enderror" value="{{ old('postal_code', $address->postal_code) }}" required>
                        @error('postal_code')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="country" class="form-label">País</label>
                        <input type="text" name="country" id="country" class="form-control @error('country') is-invalid @enderror" value="{{ old('country', $address->country) }}" required>
                        @error('country')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('addresses.index') }}" class="btn btn-outline-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Actualizar dirección</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

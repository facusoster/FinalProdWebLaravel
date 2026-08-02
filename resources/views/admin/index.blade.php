@extends('layouts.admin')

@section('content')
<h1>Panel de Administración</h1>

<p>Bienvenido Admin Sweet Store (Admin)</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button>Cerrar sesión</button>
</form>
@endsection

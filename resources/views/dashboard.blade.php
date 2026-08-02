@extends('layouts.client')

@section('content')
<h1>Dashboard del Cliente</h1>

<p>Bienvenido {{ Auth::user()->name }}</p>
@endsection

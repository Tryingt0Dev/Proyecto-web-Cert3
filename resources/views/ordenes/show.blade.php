@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Orden #{{ $orden->id }}</h2>
        <p>Total: {{ $orden->total }}</p>
        <p>Fecha: {{ $orden->created_at }}</p>
        <h3>Libros</h3>
        <ul>
            @foreach($orden->libroOrden as $libroOrden)
                <li>{{ $libroOrden->libro->titulo }} - Cantidad: {{ $libroOrden->cantidad }}</li>
            @endforeach
        </ul>
    </div>
@endsection

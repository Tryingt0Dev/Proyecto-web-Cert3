@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Mis Órdenes</h1>
        <ul>
            @foreach($ordenes as $orden)
                <li>Orden #{{ $orden->id }} - {{ $orden->created_at }}</li>
            @endforeach
        </ul>
    </div>
@endsection
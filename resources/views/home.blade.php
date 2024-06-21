@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    @foreach ($libros as $libro)
                        @if($libro->stock>0)
                                <div class="col-md-3 mb-4">
                                
                                    <div class="card shadow-sm">
                                        @if ($libro->imagen)
                                            <img src="{{ asset('storage/' . $libro->imagen) }}" class="card-img-top" alt="{{ $libro->titulo }}">
                                        @else
                                            <img src="{{ asset('storage/imagenes/default.png') }}" class="card-img-top" alt="Imagen por defecto">
                                        @endif
                                        
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $libro->titulo }}</h5>
                                                <p class="card-text">{{ $libro->descripcion }}</p>
                                                <p class="card-text">Stock: {{ $libro->stock }}</p>
                                                <form method="POST" action="{{ route('checkout') }}">
                                                    @csrf
                                                    <button class="btn btn-primary btn-block mb-2" type="submit">Comprar</button>
                                                </form>
                                                <form action="{{ route('carrito.add', $libro->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-block">Agregar al carrito</button>
                                                </form>
                                            </div>
                        
                                    </div>
                                </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

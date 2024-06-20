@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Libros') }}</div>

                    <div class="card-body">
                        <a href="{{ route('libros.agregar') }}" class="btn btn-primary mb-3">Agregar Libro</a>

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Descripción</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($libros as $libro)
                                    <tr>
                                        <td>{{ $libro->id }}</td>
                                        <td>{{ $libro->titulo }}</td>
                                        <td>{{ $libro->autor }}</td>
                                        <td>{{ $libro->descripcion }}</td>
                                        <td>{{ $libro->stock }}</td>
                                        <td>{{$libro->precio}}</td>
                                        <td>
                                            <a href="{{ route('libros.edit', $libro->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                            <form action="{{ route('libros.destroy', $libro->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

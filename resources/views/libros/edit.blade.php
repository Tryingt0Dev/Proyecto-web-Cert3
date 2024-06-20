@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Editar Libro') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('libros.update', $libro->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $libro->titulo }}" required>
                            </div>

                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input type="text" class="form-control" id="autor" name="autor" value="{{ $libro->autor }}" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="imagen">Imagen de Portada</label>
                                <input type="file" name="imagen" id="imagen" class="form-control-file">
                                @if ($libro->imagen)
                                    <img src="{{ asset('storage/' . $libro->imagen) }}" alt="Portada del Libro" style="max-width: 200px; margin-top: 10px;">
                                @else
                                    Imagen no disponible
                                @endif
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion">{{ $libro->descripcion }}</textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" class="form-control" id="precio" name="precio" value="{{ $libro->precio }}" required>
                            </div>

                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" class="form-control" id="stock" name="stock" value="{{ $libro->stock }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Agregar Libro') }}</div>

                    <div class="card-body">
                        <form action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                            </div>
                        
                            <div class="form-group">
                                <label for="autor">Autor</label>
                                <input type="text" name="autor" id="autor" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Portada</label>
                                <input type="file" name="imagen" id="imagen" class="form-control form-control-auto">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="stock">Stock</label>
                                <input type="number" name="stock" id="stock" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="number" name="precio" id="precio" class="form-control" required>
                            </div>
                        
                            <button type="submit" class="btn btn-primary">Agregar Libro</button>
                        </form>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

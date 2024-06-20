@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Carrito de Compras</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th>Libro</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $id => $details)
                    <tr>
                        <td>{{ $details['titulo'] }}</td>
                        <td>{{ $details['cantidad'] }}</td>
                        <td>{{ $details['precio'] }}</td>
                        <td>
                            <form action="{{ route('carrito.remove', $id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            <form action="{{ route('carrito.update', $id) }}" method="post">
                                @csrf
                                <input type="number" name="cantidad" value="{{ $details['cantidad'] }}" min="1">
                                <button type="submit" class="btn btn-primary">Actualizar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2"></td>
                    <td><strong>Total: ${{ $total }}</strong></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <form action="{{ route('checkout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">Procesar Compra</button>
        </form>
    </div>
@endsection

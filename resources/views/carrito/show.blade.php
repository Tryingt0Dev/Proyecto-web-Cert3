@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h2>Carrito de Compras</h2>

    @if (!empty($carrito))
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
            </tbody>
        </table>
        <p>Total: {{ $total }}</p>
        <form action="{{ route('checkout') }}" method="post">
            @csrf
            <button type="submit" class="btn btn-success">Procesar Compra</button>
        </form>
    @else
        <div class="alert alert-warning">
            Tu carrito de compras está vacío.
        </div>
    @endif
</div>
@endsection

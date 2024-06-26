@extends('layouts.app')

@section('content')
<div class="container kolor">
    <h2>Pedidos de Libros</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table ">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autor</th>
                <th>Usuario</th>
                <th>Fecha</th>
                @if(auth()->user() && auth()->user()->role === 'admin')
                    <th>Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody >
            @foreach($pedidos as $pedido)
                <tr>
                    <td>{{ $pedido->titulo }}</td>
                    <td>{{ $pedido->autor }}</td>
                    <td>{{ $pedido->user ? $pedido->user->name : 'Usuario no disponible' }}</td>
                    <td>{{ $pedido->created_at->format('d/m/Y') }}</td>
                    @if(auth()->user() && auth()->user()->role === 'admin')
                        <td>
                            <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

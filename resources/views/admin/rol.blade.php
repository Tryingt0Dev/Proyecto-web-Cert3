@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asignar rol</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(Auth::check() && Auth::user()->role === 'admin')
            <form method="POST" action="{{ route('rol') }}">
                @csrf
                <div class="form-group">
                    <label for="user_id">Usuario</label>
                    <select id="user_id" name="user_id" class="form-control" required>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="role">Rol</label>
                    <select id="role" name="role" class="form-control" required>
                        <option value="user">Usuario</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Asignar rol</button>
            </form>
        @else
            <p>No tienes permisos de administrador.</p>
        @endif
    </div>
@endsection
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'LibreriasWeb') }}</title>

   
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="{{ asset('css/custom2.css') }}" rel="stylesheet">  
    <link href="{{ asset('css/custom3.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/custom4.css') }}" rel="stylesheet"> 
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('storage\imagenes\demography.png') }}" />
</head>
<body class="color2">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm color">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <img src="{{ asset('storage/imagenes/logo.png') }}" alt="Logo" style="height: 40px ;">
                    {{ config('app.name', 'Libreria Paco') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pedidos.create') }}">Pedir libro nuevo</a>
                        </li>
                        @if (Request::is('home'))
                            @if (Auth::user()->role === 'admin')
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('rol') }}">Asignar roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('pedidos.index') }}">Lista libros pedidos</a>
                                </li>
                                <li class="nav-item">
                                    
                                    <a class="nav-link" href="{{ route('libros.index') }}">Lista libros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('libros.agregar') }}">Agregar Libros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.index') }}">Gestionar cuentas</a>
                                </li>
                            @endif
                        @endif
                        @if (!Request::is('home'))
                            @if (Auth::check() && Auth::user()->role === 'admin')
                                <a class="nav-link" href="{{ route('libros.agregar') }}">Agregar Libros</a>
                            @endif
                        @endif    
                        
                    </ul>
                    
                    
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesion') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('ordenes.index') }}">Mis Órdenes</a>
                                    <a class="dropdown-item" href="{{ route('carrito.show') }}">Carrito</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar sesion') }}
                                    </a>
                                    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

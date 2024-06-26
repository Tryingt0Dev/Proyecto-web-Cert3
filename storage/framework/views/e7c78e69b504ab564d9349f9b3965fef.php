<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'LibreriasWeb')); ?></title>

   
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="<?php echo e(asset('css/custom2.css')); ?>" rel="stylesheet">  
    <link href="<?php echo e(asset('css/custom3.css')); ?>" rel="stylesheet"> 
    <link href="<?php echo e(asset('css/custom4.css')); ?>" rel="stylesheet"> 
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('storage\imagenes\demography.png')); ?>" />
</head>
<body class="color2">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm color">
            <div class="container">
                <a class="navbar-brand" href="<?php echo e(url('/home')); ?>">
                    <img src="<?php echo e(asset('storage/imagenes/logo.png')); ?>" alt="Logo" style="height: 40px ;">
                    <?php echo e(config('app.name', 'Libreria Paco')); ?>

                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('home')); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('pedidos.create')); ?>">Pedir libro nuevo</a>
                        </li>
                        <?php if(Request::is('home')): ?>
                            <?php if(Auth::user()->role === 'admin'): ?>
                                
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('rol')); ?>">Asignar roles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('pedidos.index')); ?>">Lista libros pedidos</a>
                                </li>
                                <li class="nav-item">
                                    
                                    <a class="nav-link" href="<?php echo e(route('libros.index')); ?>">Lista libros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('libros.agregar')); ?>">Agregar Libros</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('admin.index')); ?>">Gestionar cuentas</a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php if(!Request::is('home')): ?>
                            <?php if(Auth::check() && Auth::user()->role === 'admin'): ?>
                                <a class="nav-link" href="<?php echo e(route('libros.agregar')); ?>">Agregar Libros</a>
                            <?php endif; ?>
                        <?php endif; ?>    
                        
                    </ul>
                    
                    
                    

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <?php if(auth()->guard()->guest()): ?>
                            <?php if(Route::has('login')): ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Iniciar sesion')); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <?php echo e(Auth::user()->name); ?>

                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?php echo e(route('ordenes.index')); ?>">Mis Órdenes</a>
                                    <a class="dropdown-item" href="<?php echo e(route('carrito.show')); ?>">Carrito</a>
                                    <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <?php echo e(__('Cerrar sesion')); ?>

                                    </a>
                                    
                                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                    </form>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>
</body>
</html>
<?php /**PATH C:\Users\krlos\Documents\Proyecto-web-Cert3\resources\views/layouts/app.blade.php ENDPATH**/ ?>
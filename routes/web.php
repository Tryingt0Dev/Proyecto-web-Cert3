<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\OrdenesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;

Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();



Route::get('/rol', [UserController::class, 'MostrarFormularioRol'])->name('DarRol');
Route::post('/rol', [UserController::class, 'DarRol'])->name('rol');
Route::get('/admin/index', [UserController::class, 'index'])->name('admin.index');
Route::delete('/admin/index/{user}', [UserController::class, 'destroy'])->name('admin.destroy');


Route::get('/libros', [LibroController::class, 'index'])->name('libros.index');
Route::get('/libros/agregar', [LibroController::class, 'agregar'])->name('libros.agregar');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::get('/libros/{libro}', [LibroController::class, 'show'])->name('libros.show');
Route::get('/libros/{libro}/edit', [LibroController::class, 'edit'])->name('libros.edit');
Route::put('/libros/{libro}', [LibroController::class, 'update'])->name('libros.update');
Route::delete('/libros/{libro}', [LibroController::class, 'destroy'])->name('libros.destroy');


Route::get('/carrito', [CarritoController::class, 'show'])->name('carrito.show');
Route::post('/carrito/add/{id}', [CarritoController::class, 'add'])->name('carrito.add');
Route::post('/carrito/remove/{id}', [CarritoController::class, 'remove'])->name('carrito.remove');
Route::post('/carrito/update/{id}', [CarritoController::class, 'update'])->name('carrito.update');

Route::post('/checkout', [OrdenesController::class, 'checkout'])->name('checkout');

Route::get('/ordenes', [OrdenesController::class, 'index'])->name('ordenes.index');
Route::get('/ordenes/{id}', [OrdenesController::class, 'show'])->name('ordenes.show');

Route::get('/pedidos/create', [PedidoController::class, 'create'])->name('pedidos.create');
Route::post('/pedidos', [PedidoController::class, 'store'])->name('pedidos.store');
Route::get('/pedidos', [PedidoController::class, 'index'])->name('pedidos.index');
Route::delete('/pedidos/{pedido}', [PedidoController::class, 'destroy'])->name('pedidos.destroy');

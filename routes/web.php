<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/rol', [UserController::class, 'MostrarFormularioRol'])->name('DarRol');
Route::post('/rol', [UserController::class, 'DarRol'])->name('rol');
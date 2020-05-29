<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', ['title' => 'Tu lugar ideal para turistear']);
});

Route::get('/viajero', function () {
    return view('viajero', ['title' => '¿Qué tipo de viajero eres?']);
});

Route::get('/busqueda', function () {
    return view('busqueda', ['title' => 'Búsqueda']);
});

Route::get('/administrador', function () {
    return view('administrador', ['title' => 'Administrador']);
});

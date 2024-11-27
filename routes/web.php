<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clientes', function () {
    return view('clientes');
});

Route::get('/pecas', function () {
    return view('pecas');
});

Route::get('/servicos', function () {
    return view('servicos');
});

Route::get('/pedidos', function () {
    return view('pedidos');
});

Route::get('/relatorios', function () {
    return view('relatorios');
});
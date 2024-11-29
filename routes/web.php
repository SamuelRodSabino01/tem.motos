<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SupplierController;
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
    return view('home.index');
});

Route::resource('clientes', ClientController::class);
Route::resource('pecas', PartController::class);
Route::resource('fornecedores', SupplierController::class);
Route::resource('servicos', ServiceController::class);
Route::resource('pedidos', OrderController::class);

Route::get('/relatorios', function () {
    return view('relatorios.index');
})->name('relatorios.index');
<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ServiceController;
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

Route::get('/clientes', [ClientController::class, 'index'])->name('clients.index');
Route::get('/pecas', [PartController::class, 'index'])->name('parts.index');
Route::get('/servicos', [ServiceController::class, 'index'])->name('services.index');


Route::get('/pedidos', function () {
    return view('pedidos');
});

Route::get('/relatorios', function () {
    return view('relatorios');
});
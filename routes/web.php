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

Route::get('/clientes', [ClientController::class, 'index'])->name('clientes.index');
Route::get('/clientes/novo', [ClientController::class, 'create'])->name('clientes.create');
Route::get('/clientes/editar/{id}', [ClientController::class, 'edit'])->name('clientes.edit');
Route::post('/clientes', [ClientController::class, 'store'])->name('clientes.store');
Route::put('/clientes/{id}', [ClientController::class, 'update'])->name('clientes.update');

Route::get('/clientes/{id}', [ClientController::class, 'show'])->name('clientes.show');
Route::delete('/clientes/{id}', [ClientController::class, 'destroy'])->name('clientes.destroy');

Route::get('/fornecedores', [SupplierController::class, 'index'])->name('fornecedores.index');

Route::get('/pecas', [PartController::class, 'index'])->name('pecas.index');

Route::get('/servicos', [ServiceController::class, 'index'])->name('servicos.index');

Route::get('/pedidos', [OrderController::class, 'index'])->name('pedidos.index');

Route::get('/relatorios', function () {
    return view('relatorios.index');
})->name('relatorios.index');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/empleados', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('empleados.index');
Route::get('/empleados/create', [App\Http\Controllers\EmpleadoController::class, 'create'])->name('empleados.create');
Route::post('/empleados', [App\Http\Controllers\EmpleadoController::class, 'store'])->name('empleados.store');
Route::get('/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'show'])->name('empleados.show');
Route::get('/empleados/{id}/edit', [App\Http\Controllers\EmpleadoController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'update'])->name('empleados.update');
Route::delete('/empleados/{id}', [App\Http\Controllers\EmpleadoController::class, 'destroy'])->name('empleados.destroy');
Route::get('empleados/{id}/aumentarsalario', [EmpleadoController::class, 'aumentarSalarioForm'])->name('empleados.aumentarSalarioForm');
Route::post('empleados/{id}/aumentarsalario', [EmpleadoController::class, 'aumentarSalario'])->name('empleados.aumentarSalario');


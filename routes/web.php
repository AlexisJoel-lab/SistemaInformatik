<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProformaController;
use App\Http\Controllers\SistemaController;
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
/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */

Route::get('/',HomeController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/sistemaInformatik', [SistemaController::class,'index'])->name('index');

Route::resource('categorias', CategoriaController::class);

Route::resource('productos', ProductoController::class);

Route::get('proforma', [ProformaController::class,'index'])->name('proforma');


<?php

use App\Http\Controllers\VentasController;
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

/*Route::get('/', function () {
    
    $ventas = \App\Models\Venta::all();

    return view('welcome',['ventas' => $ventas]);
});*/

Route::get('/', function () {
    return redirect('/venta');
});

Route::get('/venta',[VentasController::class,'index'])->name('ventas.index');

Route::get('/venta/create',[VentasController::class,'create'])->name('ventas.create');
Route::post('/venta/create',[VentasController::class,'store'])->name('ventas.store');

Route::get('/venta/{id}/edit',[VentasController::class,'edit'])->name('ventas.edit');
Route::put('/venta/{id}',[VentasController::class,'update'])->name('ventas.update');
Route::delete('/venta/{id}',[VentasController::class,'destroy'])->name('ventas.destroy');
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\CuantificadorController;
use App\Http\Controllers\ExtractoController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\bancoController;

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
    return view('auth.login');
});

/*  Route::get('empleado/', [EmpleadoController::class,'index']); */

Route::resource('banco', bancoController::class)->middleware('auth');
Route::resource('archivo', ArchivoController::class)->middleware('auth');
Route::resource('extracto', ExtractoController::class)->middleware('auth');
Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('plataforma', PlataformaController::class)->middleware('auth');
Route::resource('servicio', ServicioController::class)->middleware('auth');

Route::resource('cuantificador', CuantificadorController::class)->middleware('auth');
//Route::get('cuantificador/pdf', CuantificadorController::class)->middleware('auth');
Auth::routes(['register'=>false, 'reset'=>false]); 
/* Route::post('empleado/', [EmpleadoController::class,'store']);
Route::get('empleado/{$id}', [EmpleadoController::class,'destroy']);
 */




Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [bancoController::class, 'index'])->name('home')->middleware('auth');   
});


Route::get('/archivo_home', [ArchivoController::class, 'home'])->name('archivo_home')->middleware('auth');
Route::get('/home', [bancoController::class, 'index'])->name('home')->middleware('auth');

Auth::routes();

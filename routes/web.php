<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\ExtractoController;
use App\Http\Controllers\PlataformaController;


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

/* Route::get('empleado/', [EmpleadoController::class,'index']);
Route::get('empleado/create', [EmpleadoController::class,'create']); */

Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('producto', ProductoController::class)->middleware('auth');
Route::resource('archivo', ArchivoController::class)->middleware('auth');
Route::resource('extracto', ExtractoController::class)->middleware('auth');
Route::resource('plataforma', PlataformaController::class)->middleware('auth');
Auth::routes(['register'=>false, 'reset'=>false]);
/* Route::post('empleado/', [EmpleadoController::class,'store']);
Route::get('empleado/{$id}', [EmpleadoController::class,'destroy']);
 */




Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [ArchivoController::class, 'index'])->name('home');    
});


Route::get('/archivo_home', [ArchivoController::class, 'home'])->name('archivo_home')->middleware('auth');
Route::get('/home', [ProductoController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [ProductoController::class, 'index'])->name('home');

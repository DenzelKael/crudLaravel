<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\CuantificadorController;
use App\Http\Controllers\ExtractoController;
use App\Http\Controllers\PlataformaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\BancoController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\VentasController;
use App\Http\Controllers\EgresosController;
use App\Http\Controllers\DetalleEgresosController;

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
Auth::routes(['register'=>false, 'reset'=>false]); 
Route::get('banco/comission', [BancoController::class,'getComission']);


Route::group(['middleware'=>'auth'], function(){
        Route::get('/', [bancoController::class, 'index'])->name('home'); 
        Route::resource('plataforma', PlataformaController::class);
        Route::resource('servicio', ServicioController::class);
        Route::get('producto/productos',[ProductoController::class,'productos'])->name('producto.productos');
        Route::resource('producto', ProductoController::class);
        Route::resource('banco', BancoController::class)->except(['show']);
        Route::resource('extracto', ExtractoController::class);
        Route::resource('caja', CajaController::class);
        Route::resource('cuantificador', CuantificadorController::class);
        Route::resource('ventas', VentasController::class); 
        Route::resource('egresos', EgresosController::class); 
        Route::resource('detalle_egresos', DetalleEgresosController::class); 

        
});

//ruta para un futuro dashboard!
Route::get('/home', [VentasController::class, 'index'])->name('home')->middleware('auth');


Auth::routes();



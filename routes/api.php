<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ventas', function(){ 
    return response()->json();
});

/* Route::post('guardarVentas', function(){});
Route::get('obtenerVentas', function(){});
Route::get('obtenerVentasDadoId/{id}', function(){});
Route::post('actualizarVentas', function(){});


Route::post('ventas', function(){});
Route::get('ventas', function(){});
Route::put('ventas', function(){});
Route::get('ventas/{id}', function(){});
Route::delete('ventas/{id}', function(){}); */

 Route::resource('ventas', "App\Http\Controllers\VentaController");
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

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
Auth::routes(['register'=>false, 'reset'=>false]);
/* Route::post('empleado/', [EmpleadoController::class,'store']);
Route::get('empleado/{$id}', [EmpleadoController::class,'destroy']);
 */




Route::group(['middleware'=>'auth'], function(){
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');    
});

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');

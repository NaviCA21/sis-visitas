<?php

use App\Http\Controllers\PeridosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\PeriodoController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('visita', VisitaController::class);
Route::resource('usuario', UserController::class);

Route::resource('visita', VisitaController::class)->middleware('auth')->names('visita'); 
Route::resource('periodos', PeridosController::class)->middleware('auth')->names('peridos');
Route::resource('visitantes', PeriodoController::class)->middleware('auth')->names('visitantes'); 





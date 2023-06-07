<?php

use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\PeridosController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\PJuridicaController;
use App\Http\Controllers\PNaturalController;
use App\Http\Controllers\VisitaCanceladaController;
use App\Http\Controllers\VisitaCulminadaController;
use App\Http\Controllers\VisitaJuridicaController;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class)->middleware('auth')->names('user');

Route::resource('usuario', UserController::class);
Route::get('/create', [UserController::class, 'create']);


// Route::get('pjuridica/create', [PJuridicaController::class, 'create'])->name('pjuridica.create');
// Route::get('pjuridica/store', [PJuridicaController::class, 'store'])->name('pjuridica.store');



Route::get('/register', [UserController::class, 'create'])->name('register.create');
Route::post('/register', [UserController::class, 'store'])->name('register.store');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::delete('user/{user}', [UserController::class, 'delete'])->name('user.delete');
Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
// Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');

// RUTAS PARA VISITAS
// Route::get('visita/{visita}/edit', [VisitaController::class, 'edit'])->name('visita.edit');
// Route::get('visita/{visita}', [VisitaController::class, 'destroy'])->name('visita.destroy');

Route::resource('visitas', VisitaController::class);
Route::get('visitasjuridica', [VisitaJuridicaController::class, 'index'])->name('visitasjuridica.index');

Route::resource('pjuridica', PJuridicaController::class);
Route::resource('pnatural', PNaturalController::class);

Route::resource('visitaculminada', VisitaCulminadaController::class);
Route::resource('visitacancelada', VisitaCanceladaController::class);

Route::put('/visita/cancelada/{id}/restaurar', [VisitaCanceladaController::class, 'restore'])->name('visita.cancelada.restaurar');
Route::get('visita/cancelada', [VisitaController::class, 'index'])->name('visita.cancelada.index');

Route::get('/estadisticas', [EstadisticasController::class, 'index'])->name('estadisticas.index');
Route::get('/estadisticas/chart-data', [EstadisticasController::class, 'chartData'])->name('estadisticas.chartData');



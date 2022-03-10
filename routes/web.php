<?php

use App\Http\Controllers\TorneoController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect(route('home'));
});

Route::get('/nuevo_torneo', [TorneoController::class, 'crearTorneo'])->name('creartorneo')->middleware('isCreator');
Route::post('/nuevo_torneo', [TorneoController::class, 'altaTorneo'])->name('altaTorneo')->middleware('isCreator');

Route::get('/mis_torneos_creados', [TorneoController::class, 'torneosCreador'])->name('torneoscreador')->middleware('isCreator');

Route::get('/inscribir_torneo', [TorneoController::class, 'inscrTorneos'])->name('insctorneo')->middleware('isPlayer');
Route::post('/inscribir_torneo', [TorneoController::class, 'inscripcionTorneo'])->name('insctorneo')->middleware('isPlayer');
Route::get('/mis_torneos', [TorneoController::class, 'torneosJugador'])->name('torneosjugador')->middleware('isPlayer');

Route::get('/ver_torneos', [TorneoController::class, 'torneosAdministrador'])->name('torneosadministrador')->middleware('isAdmin');

Route::get('/torneo/{torneo}', [TorneoController::class, 'verTorneo'])->name('vertorneo')->middleware('isAdmin');
Route::delete('/torneo/{torneo}', [TorneoController::class, 'deleteTorneo'])->name('deletetorneo')->middleware('isAdmin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

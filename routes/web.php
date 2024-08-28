<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AsistenciaController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PersonalController;
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

Route::get('/',[LoginController::class,'index'])->name('login.index');
Route::post('/Login',[LoginController::class,'show'])->name('login.show');
Route::get('/administrador',[LoginController::class,'adm'])->name('inicio.adm');
Route::get('/colaborador',[LoginController::class,'col'])->name('iniciom.col');
Route::get('/Salir',[LoginController::class,'destroy'])->name('login.destroy');

Route::get('/regpersonal',[PersonalController::class,'index'])->name('personal.index');
Route::get('/reportepersonal',[PersonalController::class,'show'])->name('reportepersonal.show');
Route::post('/delpersonal',[PersonalController::class,'destroy'])->name('personal.destroy');
Route::post('/registrarper',[PersonalController::class,'store'])->name('registrarper.store');
Route::post('/Actpersonal',[PersonalController::class,'update'])->name('actualizarper.update');

Route::get('/reghorario',[HorarioController::class,'index'])->name('horario.index');
Route::get('/horario',[HorarioController::class,'show'])->name('horario.show');
Route::get('/dhorario',[HorarioController::class,'hor'])->name('detalleasist.hor');
Route::post('/rhorario',[HorarioController::class,'store'])->name('reghorario.store');
Route::post('/ahorario',[HorarioController::class,'update'])->name('acthorario.update');
Route::post('/delhorario',[HorarioController::class,'destroy'])->name('delhorario.destroy');
Route::get('/reporthor/all',[HorarioController::class,'getAllItemsh']);

Route::get('/regasistencia',[AsistenciaController::class,'index'])->name('asistper.index');
Route::get('/masistencia',[AsistenciaController::class,'show'])->name('asistencia.show');
Route::get('/asistencia',[AsistenciaController::class,'index'])->name('asistencia.index');
Route::get('/ingreso',[AsistenciaController::class,'inicio'])->name('ingreso.inicio');
Route::get('/salida',[AsistenciaController::class,'salida'])->name('salida.salida');
Route::post('/rasistencia',[AsistenciaController::class,'store'])->name('rasistencia.store');
Route::post('/sasistencia',[AsistenciaController::class,'update'])->name('sasistencia.update');
Route::get('/asisthoras',[AsistenciaController::class,'create'])->name('asisthoras.create');
Route::get('/reporteingresos',[AsistenciaController::class,'reportin'])->name('reportingresos.reportin');
Route::get('/reportesalida',[AsistenciaController::class,'reportout'])->name('reportsalida.reportout');
Route::get('/reportegeneral',[AsistenciaController::class,'reportgen'])->name('reportgeneral.reportgen');
Route::get('/reportin/all',[AsistenciaController::class,'getAllItems']);
Route::get('/reportout/all',[AsistenciaController::class,'getAllItemso']);
Route::get('/reportgen/all',[AsistenciaController::class,'getAllItemsg']);
Route::get('/filtroingresos',[AsistenciaController::class,'filtroin'])->name('filtroingresos.filtroin');
Route::get('/filtrosalida',[AsistenciaController::class,'filtroout'])->name('filtrosalida.filtroout');
Route::get('/filtrogeneral',[AsistenciaController::class,'filtrogen'])->name('filtrogeneral.filtrogen');


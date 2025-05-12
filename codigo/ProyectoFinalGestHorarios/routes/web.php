<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LaborController;
use App\Http\Controllers\AmbienteController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\PeriodosAcademicosController;
use App\Http\Controllers\HorarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes

*/
//route login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/eliminar-usuario-{id}', [AuthController::class, 'destroy'])->name('usuario.eliminar');

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

//route barang
Route::resource('/barang', BarangController::class)->middleware('auth');


Route::get('labores', [LaborController::class,'index'])->name('labores');
Route::post('/registrar-labor', [LaborController::class,'create'])->name('labores.crear');
Route::post('/actualizar-labor', [LaborController::class,'update'])->name('labores.actualizar');
Route::get('/eliminar-labor-{id}', [LaborController::class,'destroy'])->name('labores.eliminar');

Route::get('ambientes', [AmbienteController::class,'index'])->name('ambientes');
Route::post('/registrar-ambiente', [AmbienteController::class,'create'])->name('ambientes.crear');
Route::post('/actualizar-ambiente', [AmbienteController::class,'update'])->name('ambientes.actualizar');
Route::get('/eliminar-ambiente-{id}', [AmbienteController::class,'destroy'])->name('ambientes.eliminar');

Route::get('periodosacademicos', [PeriodosAcademicosController::class,'index'])->name('periodosacademicos');
Route::post('/registrar-pacademico', [PeriodosAcademicosController::class,'create'])->name('periodosacademicos.crear');
Route::post('/actualizar-pacademico', [PeriodosAcademicosController::class,'update'])->name('periodosacademicos.actualizar');
Route::get('/eliminar-pacademico-{id}', [PeriodosAcademicosController::class,'destroy'])->name('periodosacademicos.eliminar');

Route::get('docentes', [DocenteController::class,'index'])->name('docentes');
Route::post('/registrar-docente', [DocenteController::class,'create'])->name('docentes.crear');
Route::post('/actualizar-docente', [DocenteController::class,'update'])->name('docentes.actualizar');
Route::get('/eliminar-docente-{id}', [DocenteController::class,'destroy'])->name('docentes.eliminar');

Route::get('horarios', [HorarioController::class,'index'])->name('horarios');
Route::post('/registrar-horario', [HorarioController::class,'create'])->name('horarios.crear');
Route::post('/actualizar-horario', [HorarioController::class,'update'])->name('horarios.actualizar');
Route::get('/eliminar-horario-{id}', [HorarioController::class,'destroy'])->name('horarios.eliminar');
Route::get('/verhorario', [HorarioController::class,'mostrarHorario'])->name('verhorario');
Route::get('/verHorario/filtrar', [HorarioController::class,'filtrarHorario'])->name('filtrarHorario');
Route::get('horario/filtrar-por-docente', [HorarioController::class, 'filtrarHorarioPorDocente'])->name('filtrarHorarioPorDocente');
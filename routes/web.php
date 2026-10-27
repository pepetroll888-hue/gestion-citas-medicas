<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultorioController;
use App\Http\Controllers\CitaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('especialidades', EspecialidadController::class);

Route::resource('medicos', MedicoController::class);
// Ruta para desactivar/activar médico
Route::patch('/medicos/{medico}/toggle', [MedicoController::class, 'toggleActivo'])->name('medicos.toggle');

Route::resource('pacientes', PacienteController::class);
// Ruta para desactivar/activar paciente
Route::patch('/pacientes/{paciente}/toggle', [PacienteController::class, 'toggleActivo'])->name('pacientes.toggle');

Route::resource('consultorios', ConsultorioController::class);

Route::resource('citas', CitaController::class);
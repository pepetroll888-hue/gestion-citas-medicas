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

Route::resource('pacientes', PacienteController::class);

Route::resource('consultorios', ConsultorioController::class);

Route::resource('citas', CitaController::class);
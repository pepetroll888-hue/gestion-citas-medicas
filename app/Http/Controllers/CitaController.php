<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Consultorio;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    public function index()
    {
        $citas = Cita::with(['paciente', 'medico', 'consultorio'])->get();
        return view('citas.index', compact('citas'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        $consultorios = Consultorio::all();
        return view('citas.create', compact('pacientes', 'medicos', 'consultorios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'required|max:255',
        ]);

        Cita::create([
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'consultorio_id' => $request->consultorio_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
            'estado' => 'PROGRAMADA'
        ]);

        return redirect('/citas');
    }

    public function show(Cita $cita)
    {
        return view('citas.show', compact('cita'));
    }

    public function edit(Cita $cita)
    {
        $pacientes = Paciente::all();
        $medicos = Medico::all();
        $consultorios = Consultorio::all();
        return view('citas.edit', compact('cita', 'pacientes', 'medicos', 'consultorios'));
    }

    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'required|max:255',
            'estado' => 'required|in:PROGRAMADA,ATENDIDA,CANCELADA'
        ]);

        $cita->update([
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'consultorio_id' => $request->consultorio_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
            'estado' => $request->estado,
        ]);

        return redirect('/citas');
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect('/citas');
    }
}
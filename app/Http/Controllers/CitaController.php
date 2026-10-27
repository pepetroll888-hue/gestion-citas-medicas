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
        $pacientes = Paciente::where('activo', true)->get();
        $medicos = Medico::where('activo', true)->get();
        $consultorios = Consultorio::all();
        
        return view('citas.create', compact('pacientes', 'medicos', 'consultorios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'motivo' => 'required|max:255',
        ]);

        $medico = Medico::find($request->medico_id);
        if (!$medico || !$medico->activo) {
            return back()->withInput()->with('error', 'No se puede agendar una cita con un médico inactivo.');
        }

        $empalmeMedico = Cita::where('medico_id', $request->medico_id)
            ->where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->where('estado', 'PROGRAMADA')
            ->exists();

        if ($empalmeMedico) {
            return back()->withInput()->with('error', 'El médico ya tiene otra cita programada en esta misma fecha y hora.');
        }

        $empalmeConsultorio = Cita::where('consultorio_id', $request->consultorio_id)
            ->where('fecha', $request->fecha)
            ->where('hora', $request->hora)
            ->where('estado', 'PROGRAMADA')
            ->exists();

        if ($empalmeConsultorio) {
            return back()->withInput()->with('error', 'El consultorio ya está ocupado en esta misma fecha y hora.');
        }

        Cita::create([
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'consultorio_id' => $request->consultorio_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
            'estado' => 'PROGRAMADA'
        ]);

        return redirect('/citas')->with('success', 'Cita agendada con éxito.');
    }

    public function show(Cita $cita)
    {
        return view('citas.show', compact('cita'));
    }

    public function edit(Cita $cita)
    {
        $pacientes = Paciente::where('activo', true)->get();
        $medicos = Medico::where('activo', true)->get();
        $consultorios = Consultorio::all();
        
        return view('citas.edit', compact('cita', 'pacientes', 'medicos', 'consultorios'));
    }

    public function update(Request $request, Cita $cita)
    {
        $request->validate([
            'paciente_id' => 'required|exists:pacientes,id',
            'medico_id' => 'required|exists:medicos,id',
            'consultorio_id' => 'required|exists:consultorios,id',
            'fecha' => 'required|date|after_or_equal:today',
            'hora' => 'required',
            'motivo' => 'required|max:255',
            'estado' => 'required|in:PROGRAMADA,ATENDIDA,CANCELADA'
        ]);

        $medico = Medico::find($request->medico_id);
        if (!$medico || !$medico->activo) {
            return back()->withInput()->with('error', 'No se puede asignar una cita a un médico inactivo.');
        }

        if ($request->estado === 'PROGRAMADA') {
            $empalmeMedico = Cita::where('medico_id', $request->medico_id)
                ->where('fecha', $request->fecha)
                ->where('hora', $request->hora)
                ->where('estado', 'PROGRAMADA')
                ->where('id', '!=', $cita->id)
                ->exists();

            if ($empalmeMedico) {
                return back()->withInput()->with('error', 'El médico ya tiene otra cita programada en esta misma fecha y hora.');
            }

            $empalmeConsultorio = Cita::where('consultorio_id', $request->consultorio_id)
                ->where('fecha', $request->fecha)
                ->where('hora', $request->hora)
                ->where('estado', 'PROGRAMADA')
                ->where('id', '!=', $cita->id)
                ->exists();

            if ($empalmeConsultorio) {
                return back()->withInput()->with('error', 'El consultorio ya está ocupado en esta misma fecha y hora.');
            }
        }

        $cita->update([
            'paciente_id' => $request->paciente_id,
            'medico_id' => $request->medico_id,
            'consultorio_id' => $request->consultorio_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
            'estado' => $request->estado,
        ]);

        return redirect('/citas')->with('success', 'Cita actualizada correctamente.');
    }

    public function destroy(Cita $cita)
    {
        $cita->delete();
        return redirect('/citas')->with('success', 'Cita eliminada correctamente.');
    }
}
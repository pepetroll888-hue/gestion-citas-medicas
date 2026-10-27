<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::all();
        return view('pacientes.index', compact('pacientes'));
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'telefono' => 'required|max:20',
            'correo' => 'required|email|unique:pacientes,correo',
        ]);

        Paciente::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'activo' => true
        ]);

        return redirect('/pacientes')->with('success', 'Paciente registrado con éxito.');
    }

    public function show(Paciente $paciente)
    {
        $paciente->load('citas.medico', 'citas.consultorio');
        return view('pacientes.show', compact('paciente'));
    }

    public function edit(Paciente $paciente)
    {
        return view('pacientes.edit', compact('paciente'));
    }

    public function update(Request $request, Paciente $paciente)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'telefono' => 'required|max:20',
            'correo' => 'required|email|unique:pacientes,correo,' . $paciente->id,
        ]);

        $paciente->update($request->all());

        return redirect('/pacientes')->with('success', 'Paciente actualizado con éxito.');
    }

    public function destroy(Paciente $paciente)
    {
        $tieneCitasVigentes = $paciente->citas()->where('estado', 'PROGRAMADA')->exists();

        if ($tieneCitasVigentes) {
            return redirect('/pacientes')->with('error', 'No se puede eliminar el paciente porque tiene citas vigentes programadas.');
        }

        $paciente->delete();
        return redirect('/pacientes')->with('success', 'Paciente eliminado correctamente.');
    }

    public function toggleActivo(Paciente $paciente)
    {
        // Si se intenta desactivar y tiene citas programadas activas, se bloquea
        if ($paciente->activo) {
            $tieneCitasVigentes = $paciente->citas()->where('estado', 'PROGRAMADA')->exists();
            if ($tieneCitasVigentes) {
                return redirect('/pacientes')->with('error', 'No se puede desactivar el paciente porque tiene citas vigentes programadas.');
            }
        }

        $paciente->activo = !$paciente->activo;
        $paciente->save();

        return redirect('/pacientes')->with('success', 'Estado del paciente actualizado.');
    }
}
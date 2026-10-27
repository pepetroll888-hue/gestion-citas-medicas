<?php

namespace App\Http\Controllers;

use App\Models\Medico;
use App\Models\Especialidad;
use App\Models\Consultorio;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Medico::with(['especialidad', 'consultorio'])->get();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        $especialidades = Especialidad::all();
        $consultorios = Consultorio::all();
        return view('medicos.create', compact('especialidades', 'consultorios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'telefono' => 'required|max:20',
            'correo' => 'required|email|unique:medicos,correo',
            'especialidad_id' => 'required|exists:especialidades,id',
            'consultorio_id' => 'required|exists:consultorios,id',
        ]);

        Medico::create([
            'nombre' => $request->nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'telefono' => $request->telefono,
            'correo' => $request->correo,
            'especialidad_id' => $request->especialidad_id,
            'consultorio_id' => $request->consultorio_id,
            'activo' => true
        ]);

        return redirect('/medicos')->with('success', 'Médico registrado con éxito.');
    }

    public function show(Medico $medico)
    {
        $medico->load('citas.paciente', 'consultorio', 'especialidad');
        return view('medicos.show', compact('medico'));
    }

    public function edit(Medico $medico)
    {
        $especialidades = Especialidad::all();
        $consultorios = Consultorio::all();
        return view('medicos.edit', compact('medico', 'especialidades', 'consultorios'));
    }

    public function update(Request $request, Medico $medico)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'apellido_paterno' => 'required|max:100',
            'apellido_materno' => 'required|max:100',
            'telefono' => 'required|max:20',
            'correo' => 'required|email|unique:medicos,correo,' . $medico->id,
            'especialidad_id' => 'required|exists:especialidades,id',
            'consultorio_id' => 'required|exists:consultorios,id',
        ]);

        $medico->update($request->all());

        return redirect('/medicos')->with('success', 'Médico actualizado con éxito.');
    }

    public function destroy(Medico $medico)
    {
        $tieneCitasActivas = $medico->citas()->where('estado', 'PROGRAMADA')->exists();

        if ($tieneCitasActivas) {
            return redirect('/medicos')->with('error', 'No se puede eliminar el médico porque tiene citas programadas activas.');
        }

        $medico->delete();
        return redirect('/medicos')->with('success', 'Médico eliminado correctamente.');
    }

    public function toggleActivo(Medico $medico)
    {
        // Si se intenta desactivar y tiene citas programadas activas, se bloquea
        if ($medico->activo) {
            $tieneCitasActivas = $medico->citas()->where('estado', 'PROGRAMADA')->exists();
            if ($tieneCitasActivas) {
                return redirect('/medicos')->with('error', 'No se puede desactivar el médico porque tiene citas programadas activas.');
            }
        }

        $medico->activo = !$medico->activo;
        $medico->save();

        return redirect('/medicos')->with('success', 'Estado del médico actualizado.');
    }
}
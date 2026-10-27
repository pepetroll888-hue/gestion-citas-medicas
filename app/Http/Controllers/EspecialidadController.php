<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = Especialidad::all();

        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:100',
            'descripcion' => 'nullable'
        ]);

        Especialidad::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion
        ]);

        return redirect('/especialidades');
    }

    public function show($id)
    {
        $especialidad = Especialidad::findOrFail($id);

        return view('especialidades.show', compact('especialidad'));
    }

    public function edit($id)
    {
        $especialidad = Especialidad::findOrFail($id);

        return view('especialidades.edit', compact('especialidad'));
    }

    public function update(Request $request, $id)
    {
        $especialidad = Especialidad::findOrFail($id);

        $especialidad->nombre = $request->nombre;
        $especialidad->descripcion = $request->descripcion;

        $especialidad->save();

        return redirect('/especialidades');
    }

    public function destroy($id)
    {
        $especialidad = Especialidad::findOrFail($id);

        $especialidad->delete();

        return redirect('/especialidades');
    }
}
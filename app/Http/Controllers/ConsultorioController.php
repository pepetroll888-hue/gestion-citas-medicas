<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    public function index()
    {
        $consultorios = Consultorio::all();
        return view('consultorios.index', compact('consultorios'));
    }

    public function create()
    {
        return view('consultorios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|max:50',
            'ubicacion' => 'required|max:255',
        ]);

        Consultorio::create($request->all());

        return redirect('/consultorios')->with('success', 'Consultorio registrado con éxito.');
    }

    public function show(Consultorio $consultorio)
    {
        return view('consultorios.show', compact('consultorio'));
    }

    public function edit(Consultorio $consultorio)
    {
        return view('consultorios.edit', compact('consultorio'));
    }

    public function update(Request $request, Consultorio $consultorio)
    {
        $request->validate([
            'numero' => 'required|max:50',
            'ubicacion' => 'required|max:255',
        ]);

        $consultorio->update($request->all());

        return redirect('/consultorios')->with('success', 'Consultorio actualizado con éxito.');
    }

    public function destroy(Consultorio $consultorio)
    {
        $consultorio->delete();
        return redirect('/consultorios')->with('success', 'Consultorio eliminado correctamente.');
    }
}
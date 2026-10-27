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
            'numero' => 'required|max:20|unique:consultorios,numero',
            'ubicacion' => 'required|max:100',
        ]);

        Consultorio::create([
            'numero' => $request->numero,
            'ubicacion' => $request->ubicacion,
            'activo' => true
        ]);

        return redirect('/consultorios');
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
            'numero' => 'required|max:20|unique:consultorios,numero,' . $consultorio->id,
            'ubicacion' => 'required|max:100',
        ]);

        $consultorio->update([
            'numero' => $request->numero,
            'ubicacion' => $request->ubicacion,
        ]);

        return redirect('/consultorios');
    }

    public function destroy(Consultorio $consultorio)
    {
        $consultorio->delete();
        return redirect('/consultorios');
    }
}
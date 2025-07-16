<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfesionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //obtenemos al usuario autenticado
        $user = Auth::user();

    // buscamos a los pacientes que le pertenecen al usuario y carga las citas y las notas y los obtenemos y guardamos en la varibale
        $pacientes = $user->pacientes()->with("citas", "notas")->get();

        $citas = $pacientes->flatMap->citas;
        $notas = $pacientes->flatMap->notas;

        return view("profesional.dashboard", compact("pacientes", "citas", "notas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'contenido' => 'required|string',
            'fecha' => 'required|date',
            'paciente_id' => 'required|exists:pacientes,id',
            'peso_o_medida' => 'nullable|string',
        ]);

        $paciente = Auth::user()->pacientes()->findOrFail($request->paciente_id);
        $paciente->notas()->create($request->all());


        return redirect()->route(Auth::user()->getRoleNames()->first() . '.notas.index')->with('success', 'Nota creada correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Nota $nota)
    {
        return view(Auth::user()->getRoleNames()->first() . '.notas.show', compact('nota'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nota $nota)
    {
        $pacientes = Auth::user()->pacientes;
        return view(Auth::user()->getRoleNames()->first() . '.notas.edit', compact('nota', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nota $nota)
    {
         $request->validate([
            'contenido' => 'required|string',
            'fecha' => 'required|date',
            'paciente_id' => 'required|exists:pacientes,id',
            'peso_o_medida' => 'nullable|string',
        ]);

        $nota->update($request->all());

        return redirect()->route(Auth::user()->getRoleNames()->first() . '.notas.index')->with('success', 'Nota actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nota $nota)
    {
            $nota->delete();

        return redirect()->route(Auth::user()->getRoleNames()->first() . '.notas.index')->with('success', 'Nota eliminada correctamente.');
    }
}

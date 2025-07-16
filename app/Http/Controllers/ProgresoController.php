<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\Progreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgresoController extends Controller
{
    public function create(Paciente $paciente)
    {
        return view('profesional.progresos.create', compact('paciente'));
    }

    public function store(Request $request, Paciente $paciente)
    {
        $request->validate([
            'fecha' => 'required|date',
            'peso' => 'nullable|numeric',
            'cintura' => 'nullable|numeric',
            'cadera' => 'nullable|numeric',
            'altura' => 'nullable|numeric',
            'observaciones' => 'nullable|string|max:255',
        ]);

        $paciente->progresos()->create($request->all());

        return redirect()->route('profesional.pacientes.show', $paciente)
                         ->with('success', 'Progreso agregado correctamente.');
    }
}

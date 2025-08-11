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
public function index(Request $request)
{
    $user = Auth::user();

    $fechaLimitePago = now()->addDays(30)->toDateString(); // formato YYYY-MM-DD

    // ====================
    // Pacientes
    // ====================
    $pacientesQuery = $user->pacientes()->with('citas', 'notas');

    if ($request->filled('filter_nombre')) {
        $pacientesQuery->where('nombre', 'like', '%' . $request->filter_nombre . '%');
    }

    $pacientes = $pacientesQuery->paginate(5, ['*'], 'pacientes_page');

    // ====================
    // Citas
    // ====================
    $citasQuery = $user->citas()->latest();

    if ($request->filled('filter_nombre')) {
        $nombre = $request->filter_nombre;
        $citasQuery->whereHas('paciente', function ($query) use ($nombre) {
            $query->where('nombre', 'like', '%' . $nombre . '%');
        });
    }

    if ($request->filled('filter_fecha')) {
        $citasQuery->where('fecha', $request->filter_fecha);
    }

    $citas = $citasQuery->paginate(5, ['*'], 'citas_page');

    // ====================
    // Notas
    // ====================
    $notasQuery = $user->notas()->latest();

    if ($request->filled('filter_nombre')) {
        $nombre = $request->filter_nombre;
        $notasQuery->whereHas('paciente', function ($query) use ($nombre) {
            $query->where('nombre', 'like', '%' . $nombre . '%');
        });
    }

    if ($request->filled('filter_fecha')) {
        $notasQuery->where('fecha', $request->filter_fecha);
    }

    $notas = $notasQuery->paginate(5, ['*'], 'notas_page');

    return view('profesional.dashboard', compact(
        'pacientes',
        'citas',
        'notas',
        'fechaLimitePago'
    ));
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

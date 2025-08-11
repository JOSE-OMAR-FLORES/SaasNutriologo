<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

use Illuminate\Support\Facades\Hash;

class ClinicaController extends Controller
{
    // DASHBOARD
   public function index()
{
    $nutriologos = User::role('profesional')
        ->where('clinica_id', Auth::id())
        ->get();

    $totalUsuarios = User::role('profesional')
        ->where('clinica_id', Auth::id())
        ->count();

    $totalNutriologos = $totalUsuarios; // mismo número para mostrar

    $maxNutriologos = 5; // máximo permitido

    // Contar pacientes activos de la clínica (puedes definir qué es "activo")
    // Aquí asumo que "activo" es que tienen al menos 1 cita pendiente o algo así
    $pacientesActivos = Paciente::whereHas('user', function($query) {
        $query->where('clinica_id', Auth::id());
    })->count();

    // Contar citas para hoy de todos los nutriologos de la clínica
    $idsNutriologos = $nutriologos->pluck('id');
    $hoy = Carbon::today()->toDateString();
    //$citasHoy = \App\Models\Cita::whereIn('user_id', $idsNutriologos)->whereDate('fecha', $hoy)->count();

    return view('clinica.dashboard', compact(
        'nutriologos', 
        'totalUsuarios', 
        'totalNutriologos',
        'maxNutriologos',
        'pacientesActivos'
    ));
}

    // LISTADO DE NUTRIÓLOGOS (GESTIONAR USUARIOS)
    public function nutriologosIndex()
    {
        $nutriologos = User::role('profesional')
            ->where('clinica_id', Auth::id())
            ->get();

        return view('clinica.nutriologos.index', compact('nutriologos'));
    }

    public function create()
    {
        return view('clinica.nutriologos.create');
    }

    public function store(Request $request)
    {
        $count = User::where('clinica_id', Auth::id())->count();

        if ($count >= 5) {
            return redirect()->route('clinica.nutriologos.index')
                ->with('error', 'Solo puedes agregar hasta 5 nutriólogos.');
        }

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'clinica_id' => Auth::id(),
        ]);

        $user->assignRole('profesional');

        return redirect()->route('clinica.nutriologos.index')
            ->with('success', 'Nutriólogo creado correctamente.');
    }

    public function show(string $id)
    {
        $nutriologo = User::role('profesional')
            ->where('clinica_id', Auth::id())
            ->findOrFail($id);

        return view('clinica.nutriologos.show', compact('nutriologo'));
    }

    public function edit(string $id)
    {
        $nutriologo = User::where('clinica_id', Auth::id())->findOrFail($id);

        return view('clinica.nutriologos.edit', compact('nutriologo'));
    }

    public function update(Request $request, string $id)
    {
        $nutriologo = User::where('clinica_id', Auth::id())->findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email,' . $nutriologo->id,
        ]);

        $nutriologo->update($request->only(['name', 'email']));

        return redirect()->route('clinica.nutriologos.index')
            ->with('success', 'Nutriólogo actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $nutriologo = User::where('clinica_id', Auth::id())->findOrFail($id);
        $nutriologo->delete();

        return redirect()->route('clinica.nutriologos.index')
            ->with('success', 'Nutriólogo eliminado correctamente.');
    }
    public function pacientesPorNutriologo()
{
    $nutriologos = User::role('profesional')
        ->where('clinica_id', Auth::id())
        ->withCount('pacientes')  // Cuenta pacientes relacionados a cada nutriólogo
        ->get();

    // Suma total de pacientes de todos los nutriólogos
    $totalPacientes = $nutriologos->sum('pacientes_count');

    return view('clinica.nutriologos.verPacientes', compact('nutriologos', 'totalPacientes'));
}

}

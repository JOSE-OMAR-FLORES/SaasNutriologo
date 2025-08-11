<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $user = Auth::user();

    // Filtro para pacientes por nombre
    $pacientesQuery = $user->pacientes();
    if ($request->filled('filter_nombre')) {
        $pacientesQuery->where('nombre', 'like', '%' . $request->filter_nombre . '%');
    }
    $pacientes = $pacientesQuery->paginate(5, ['*'], 'pacientes_page');

    // Filtro para citas por paciente nombre (relación)
    $citasQuery = $user->citas()->latest();
    if ($request->filled('filter_nombre')) {
        $nombre = $request->filter_nombre;
        $citasQuery->whereHas('paciente', function ($query) use ($nombre) {
            $query->where('nombre', 'like', '%' . $nombre . '%');
        });
    }
    $citas = $citasQuery->paginate(5, ['*'], 'citas_page');

    // Filtro para notas por paciente nombre (relación)
    $notasQuery = $user->notas()->latest();
    if ($request->filled('filter_nombre')) {
        $nombre = $request->filter_nombre;
        $notasQuery->whereHas('paciente', function ($query) use ($nombre) {
            $query->where('nombre', 'like', '%' . $nombre . '%');
        });
    }
    $notas = $notasQuery->paginate(5, ['*'], 'notas_page');

    return view('free.dashboard', compact('pacientes', 'citas', 'notas'));
}





}

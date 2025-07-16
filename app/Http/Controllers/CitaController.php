<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //*obtenemos el usuario logeado y lo devuelve
        $user = Auth::user();

        //*obtenemos las citas del usuario el latests los ordena de forma descendente y get los obtiene
        $citas = $user->citas()->latest()->get();

        //*mandamos una vista //obtenemos el nombre del rol: free, profesional  y despues el nombre de la vista y compact pasa la varible que hemos definido antes
        return view($user->getRoleNames()->first() . ".citas.index", compact("citas"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Auth::user()->pacientes;
        return view(Auth::user()->getRoleNames()->first() . ".citas.create", compact("pacientes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "fecha" => "required|date",
            "hora" => "nullable",
            "motivo" => "required|string",
            "estado" => "required|in:pendiente,realizada,cancelada",
            "paciente_id" => "required|exists:pacientes,id"
        ]);

            // Buscar el paciente dentro de los pacientes del usuario logueado
    $paciente = Auth::user()->pacientes()->findOrFail($request->paciente_id);

    // Crear la cita desde el paciente
     $paciente->citas()->create([
        'fecha' => $request->fecha,
        'hora' => $request->hora,
        'motivo' => $request->motivo,
        'estado' => $request->estado,
    ]);

        return redirect()->route(Auth::user()->getRoleNames()->first() . ".dashboard")->with("success", "Cita creada satisfactoriamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        return view(Auth::user()->getRoleNames()->first() . '.citas.show', compact('cita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cita $cita)
    {
        $pacientes = Auth::user()->pacientes()->get();
        return view(Auth::user()->getRoleNames()->first() . ".citas.edit", compact("cita", "pacientes"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
         $request->validate([
            "fecha" => "required|date",
            "hora" => "nullable",
            "motivo" => "required|string",
            "estado" => "required|in:pendiente,realizada,cancelada",
            "paciente_id" => "required|exists:pacientes,id"
        ]);

        $cita->update($request->all());

        return redirect()->route(Auth::user()->getRoleNames()->first() . ".dashboard")->with("success", "Cita actualizada satisfactoriamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cita $cita)
    {
        //* solo el usuario(nutriologo) podra eliminar al paciente
        // ! $this->authorize('delete', $paciente);

        //*Eliminar paciente
        $cita->delete();

        //*despues de eliminarlo obtiene nuevamente nuestro rol y lo concatena con la vista , enviandonos a el listado y manda el mensaje
        return redirect()->route(Auth::user()->getRoleNames()->first() . '.dashboard')->with('success', 'Cita eliminado correctamente.');
    }
}

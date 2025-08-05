<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;
use Spatie\Permission\Models\Role as ModelsRole;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

public function index(Request $request)
{
    $rol = $request->input('rol');

    $query = User::with('roles')
    ->whereDoesntHave('roles', function ($q) {
        $q->where('name', 'admin');
    });

if ($rol) {
    $query->whereHas('roles', function ($q) use ($rol) {
        $q->where('name', $rol);
    });
}

    $usuarios = $query->paginate(10);


    if ($rol === 'clinica') {
        foreach ($usuarios as $clinica) {
            $clinica->nutriologos_count = User::whereHas('roles', function ($q) {
                $q->where('name', 'profesional');
            })
            ->where('clinica_id', $clinica->id)
            ->count();
        }
    }

    $usuariosPorRol = [
    'free' => User::role('free')->count(),
    'clinica' => User::role('clinica')->count(),
    'profesional' => User::role('profesional')->count(),
];

    return view('admin.dashboard', compact('usuarios', 'rol', "usuariosPorRol"));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->update($request->only('name', 'email'));
    return redirect()->back()->with('success', 'Usuario actualizado correctamente');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $user->delete();
    return redirect()->back()->with('success', 'Usuario eliminado correctamente');
}
}

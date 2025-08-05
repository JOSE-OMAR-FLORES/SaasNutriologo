<?php

namespace App\Http\Controllers;

use App\Models\Nutriologo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ClinicaController extends Controller
{
    public function index()
    {
        $nutriologos = User::role('profesional') // rol = profesional (nutriólogo)
    ->where('clinica_id', Auth::id())    // creados por la clínica actual
    ->get();

    return view('clinica.nutriologos.index', compact('nutriologos'));
    }



    public function create()
    {
        return view(Auth::user()->getRoleNames()->first() . '.nutriologos.create');
    }

    public function store(Request $request)
    {
        $count = User::where('clinica_id', Auth::id())->count();

        if ($count >= 5) {
            return redirect()->route(Auth::user()->getRoleNames()->first() . '.nutriologos.index')
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

//hasRole('clinica') ? Auth::id() : null
        ]);

        $user->assignRole('profesional');

        return redirect()->route(Auth::user()->getRoleNames()->first() . '.nutriologos.index')
            ->with('success', 'Nutriólogo creado correctamente.');
    }

    public function show(string $id)
    {
        $nutriologo = User::role('profesional')
            ->where('clinica_id', Auth::id())
            ->findOrFail($id);

        return view(Auth::user()->getRoleNames()->first() . '.nutriologos.show', compact('nutriologo'));
    }

    public function edit(string $id)
    {
        $nutriologo = User::where('clinica_id', Auth::id())->findOrFail($id);

        return view(Auth::user()->getRoleNames()->first() . '.nutriologos.edit', compact('nutriologo'));
    }

    public function update(Request $request, string $id)
    {
        $nutriologo = User::where('clinica_id', Auth::id())->findOrFail($id);

        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email|unique:nutriologos,email,' . $nutriologo->id,
            'telefono' => 'nullable|string',
        ]);

        $nutriologo->update($request->only(['nombre', 'email', 'telefono']));

        return redirect()->route(Auth::user()->getRoleNames()->first() . '.nutriologos.index')
            ->with('success', 'Nutriólogo actualizado correctamente.');
    }

    public function destroy(string $id)
    {
        $nutriologo = User::where('clinica_id', Auth::id())->findOrFail($id);
        $nutriologo->delete();

        return redirect()->route(Auth::user()->getRoleNames()->first() . '.nutriologos.index')
            ->with('success', 'Nutriólogo eliminado correctamente.');
    }
}

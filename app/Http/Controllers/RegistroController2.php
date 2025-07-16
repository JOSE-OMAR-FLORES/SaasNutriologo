<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroController2 extends Controller
{
   public function mostrarFormulario(Request $request)
{
    $plan = $request->query('plan');

    if (!in_array($plan, ['free', 'profesional', 'clinica'])) {
        return redirect()->route('elige.plan')->with('error', 'Selecciona un plan válido.');
    }

    return view('auth.register', compact('plan'));
}
}

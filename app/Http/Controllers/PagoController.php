<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PagoController extends Controller
{
    // Muestra la vista de checkout
    public function checkout($plan)
    {
        // Verifica que el plan sea válido
        if (!in_array($plan, ['profesional', 'clinica'])) {
            return redirect('/register')->with('error', 'Plan no válido');
        }

        return view('checkout', compact('plan'));
    }

    // Procesa el pago y crea al usuario
    public function procesar(Request $request)
    {
        $data = session('user_data');

        if (!$data) {
            return redirect('/register')->with('error', 'Sesión expirada, intenta de nuevo.');
        }

        // Aquí simulas el "pago exitoso"
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole($data['plan']);

        // Limpia los datos de la sesión
        session()->forget('user_data');

        // Loguea al usuario automáticamente
        auth()->login($user);

        // Redirige según su rol
        return redirect()->route('dashboard');
    }
}

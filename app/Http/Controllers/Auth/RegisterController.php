<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Redirección después del registro.
     */
    protected $redirectTo = '/home';

    /**
     * Solo accesible para usuarios no autenticados.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Mostrar formulario de registro según plan.
     */
    public function showRegistrationForm()
    {
    return view('auth.register');
    }

    /**
     * Validar campos del formulario.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'plan' => ['required', 'in:free,profesional,clinica'],
        ]);
    }

    /**
     * Registrar usuario (free) o redirigir a pago (profesional/clinica).
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $plan = $request->input('plan');

        if ($plan !== 'free') {
            // Guardar temporalmente los datos en sesión
            session(['user_data' => $request->all()]);
            return redirect()->route('checkout', ['plan' => $plan]);
        }

        // Registrar directamente si es plan free
        $user = $this->create($request->all());

        Auth::login($user);

        return redirect($this->redirectPath());
    }

    /**
     * Crear usuario en la base de datos.
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('free');

        return $user;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Etiqueta;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


//*Auth::user()->getRoleNames()->first()   Esto hace que neustro controlador funcione para los diferentes roles que tengamos sin tener que diplicar codigo

class PacienteController extends Controller
{
    /**
     * Mostraremos los pacientes del usuario(nutriologo)
     */
    public function index()
    {
        //* Devuelve el usuario logeado
        $user = Auth::user();
                    //*accedemos a la relacion con el modelo User, latest()ordena por fecha descendente, get() los obtiene
        $pacientes = $user->pacientes()->latest()->get();
//*mandamos una vista //obtenemos el nombre del rol: free, profesional  y despues el nombre de la vista y compact pasa la varible que hemos definido antes
        return view($user->getRoleNames()->first() . ".pacientes.index", compact("pacientes"));
    }

    /**
     * Mostraremos la vista del formulario.
     */
    public function create()
    {
        $etiquetas = Etiqueta::all();

//*Mandamos la vista //Auth::user()->getRoleNames()->first() obtiene el rol del usuario, concatenamos con el . el rol y despues sigue la vista
        return view(Auth::user()->getRoleNames()->first() . ".pacientes.create", compact("etiquetas"));
    }

    /**
     * Recibimos los datos = $request
     */
    public function store(Request $request)
    {
        //*validamos los datos antes de guardarlos
        $request ->validate([
            "nombre" => "required|string|max:120",
            "edad" => "required|integer|min:2|max:110",
            "sexo" => "required|in:Masculino,Femenino,Otro",
            "telefono" => "required|string|max:20"
        ]);

        //* creamos un paciente relacionado al usuario actual(free, profesional), 
                            //*$request->all() nos mandan los datos y aqui creamos los pacientes y lo asociamos al usario que esta autentificado
        $paciente=Auth::user()->pacientes()->create($request->all());
            //* nos redirije al listado de los pacientes , sabiendo nuestro direccion obteniendo nuestro rol y concatenadno con el . asi es como nos lleva a la vista
            $paciente->etiquetas()->sync($request->input('etiquetas', []));

        return redirect()->route(Auth::user()->getRoleNames()->first() . ".dashboard")->with("success", "Paciente creado satifactoriamente");
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        $progresos = $paciente->progresos()->orderBy('fecha')->get();

    //* Extraer datos para la gráfica
        $fechas = $progresos->pluck('fecha');
        $pesos = $progresos->pluck('peso');
        return view(Auth::user()->getRoleNames()->first() . '.pacientes.show', compact('paciente', "fechas", "pesos"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paciente $paciente)
    {
        $etiquetas = Etiqueta::all();

        //*protegue de que el usuario(nutriologo) lo edite
        // ! $this->authorize("update", $paciente);

        //*carga la vista dependiendo nuestro rol y concatena con el . y envia la variable paciente
        return view(Auth::user()->getRoleNames()->first() . ".pacientes.edit", compact("paciente", "etiquetas"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        //* valida los datos que actualizaremos
        $request ->validate([
            "nombre" => "required|string|max:120",
            "edad" => "required|integer|min:2|max:110",
            "sexo" => "required|in:Masculino,Femenino,Otro",
            "telefono" => "required|string|max:20"
        ]);

        // Actualizar los datos del paciente
    $paciente->update([
        'nombre' => $request->nombre,
        'edad' => $request->edad,
        'sexo' => $request->sexo,
        'telefono' => $request->telefono,
    ]);


        //*actializa los datos del paciente con lo que se envia al fomrulario
                        //*$request->all() nos mandan los datos y aqui actualizamos los pacientes y lo asociamos al usario que esta autentificado
        $paciente->update($request->all());

        $paciente->etiquetas()->sync($request->input('etiquetas', []));

        //* redirije al listado de los pacientes conforme al rol que se tiene y concatena la vista mandando un mensaje
        return redirect()->route(Auth::user()->getRoleNames()->first() . '.dashboard')->with('success', 'Paciente actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paciente $paciente)
    {
        //* solo el usuario(nutriologo) podra eliminar al paciente
        // ! $this->authorize('delete', $paciente);

        //*Eliminar paciente
        $paciente->delete();

        //*despues de eliminarlo obtiene nuevamente nuestro rol y lo concatena con la vista , enviandonos a el listado y manda el mensaje
        return redirect()->route(Auth::user()->getRoleNames()->first() . '.dashboard')->with('success', 'Paciente eliminado correctamente.');
    }
}

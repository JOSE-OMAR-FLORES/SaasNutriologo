<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FreeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //obtenemos al usuario que esta autenticado
        $user = Auth::user();

    //buscamos a los pacientes que le pertenecen al usuario y carga las citas y las notas y los obtenemos y guardamos en la varibale
        $pacientes = $user->pacientes()->with("citas", "notas")->get();

        $citas = $user->citas()->latest()->get();

        $notas = $user->notas()->latest()->get();

        //mandamos a la variable pacientes ala vista
        return view("free.dashboard", compact("pacientes", "citas", "notas"));
    }

}

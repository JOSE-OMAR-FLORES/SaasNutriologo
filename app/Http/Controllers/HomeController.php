<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //aqui solo llegan los usuarios auth y revisa que rol son y los envia a su url
        $user = \Auth::user();
        if($user->hasRole("admin")){
            return redirect('admin/dashboard');
        }elseif($user->hasRole("clinica")){
            return redirect('clinica/dashboard');
        }elseif($user->hasRole("profesional")){
            return redirect('profesional/dashboard');
        }elseif($user->hasRole("free")){
            return redirect('free/dashboard');
        }else{
            return redirect('home');
        }
        

        
        
    }
}

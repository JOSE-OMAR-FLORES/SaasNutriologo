<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClinicaController;
use App\Http\Controllers\FreeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\ProfesionalController;
use App\Http\Controllers\ProgresoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/elige-plan', function () {
    return view('auth.planes');
})->name('elige.plan');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/checkout/{plan}', [PagoController::class, 'checkout'])->name('checkout');

Route::post('/pago/procesar', [PagoController::class, 'procesar'])->name('pago.procesar');

//Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard.redirect');


//RUTAS ADMINS

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

//RUTAS CLINCA

Route::middleware(['auth', 'role:clinica'])->group(function () {
    Route::get('clinica/dashboard', [ClinicaController::class, 'index'])->name('clinica.dashboard');
});


//RUTAS PROFESIONALES

Route::middleware(['auth', 'role:profesional'])->group(function () {
    //mostramos la vista del dashboard con este controlador
    Route::get('profesional/dashboard', [ProfesionalController::class, 'index'])->name('profesional.dashboard');
    //nuestro crud de nuestros pacientes  y nombramos con names para que no haya problemas inicaremos con ejemplo: free.pacientes.index
    Route::resource('profesional/pacientes', PacienteController::class)->names("profesional.pacientes");
    
    Route::resource('profesional/citas', CitaController::class)->names("profesional.citas");

    Route::resource('profesional/notas', NotaController::class)->names("profesional.notas");

    Route::get('profesional/pacientes/{paciente}/progresos/create', [ProgresoController::class, 'create'])->name('profesional.progresos.create');
    
    Route::post('profesional/pacientes/{paciente}/progresos', [ProgresoController::class, 'store'])->name('profesional.progresos.store');
});

//RUTAS FREE

Route::middleware(['auth', 'role:free'])->group(function () {
    //mostramos la vista del dashboard con este controlador
    Route::get('free/dashboard', [FreeController::class, 'index'])->name('free.dashboard');
    //nuestro crud de nuestros pacientes  y nombramos con names para que no haya problemas inicaremos con ejemplo: free.pacientes.index
    Route::resource('free/pacientes', PacienteController::class)->names("free.pacientes");

    Route::resource('free/citas', CitaController::class)->names("free.citas");

    Route::resource('free/notas', NotaController::class)->names("free.notas");
});

//Todo: admin@example.com , "admin123"
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $fillable = [
        "fecha", 
        "hora",
        "motivo",
        "estado",  //pendiente, realizada, cancelada
        "user_id", //nutriologo que le pertenece la cita
        "paciente_id" //paciente que le pertenece la cita

    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function paciente(){
        return $this->belongsTo(Paciente::class);
    }
}

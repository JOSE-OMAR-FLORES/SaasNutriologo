<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        "nombre",
        "edad",
        "sexo",
        "telefono",
        "user_id" //Nutriologo al que pertenece
    ];

    //un paciente le pertenece a un usuario(nutriologo)
    public function user(){
        return $this->belongsTo(User::class);
    }

    //un paciente puede tener muchas citas
    public function citas(){
        return $this->hasMany(Cita::class);
    }

    //un paciente puede tener muchas notas
    public function notas(){
        return $this->hasMany(Nota::class);
    }

    public function etiquetas()
{
    return $this->belongsToMany(Etiqueta::class);
}

public function progresos()
{
    return $this->hasMany(Progreso::class);
}

}

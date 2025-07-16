<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etiqueta extends Model
{
    protected $fillable = ['nombre'];

    public function pacientes()
    {
        return $this->belongsToMany(Paciente::class);
    }
}

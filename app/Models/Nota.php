<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $fillable = [
        'contenido',
        'peso_o_medida',
        'fecha',
        'paciente_id'];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}


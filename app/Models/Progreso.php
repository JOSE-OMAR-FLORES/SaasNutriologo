<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Progreso extends Model
{
    protected $fillable = [
        'paciente_id',
        'fecha',
        'peso',
        'cintura',
        'cadera',
        'altura',
        'observaciones',
    ];

    public function paciente()
    {
        return $this->belongsTo(Paciente::class);
    }
}

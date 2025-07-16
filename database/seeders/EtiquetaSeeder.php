<?php

namespace Database\Seeders;

use App\Models\Etiqueta;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtiquetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etiquetas = ['Niño', 'Adolescente', 'Adulto Mayor', 'Embarazada', 'Diabético'];


        foreach ($etiquetas as $nombre) {
        Etiqueta::create(['nombre' => $nombre]);
    }
    }
}

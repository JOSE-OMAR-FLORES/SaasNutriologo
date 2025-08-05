<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function muestra_la_lista_de_usuarios()
    {
        // Crear usuarios de prueba
        \App\Models\User::factory()->count(3)->create();

        // Simular un admin autenticado
        $admin = \App\Models\User::factory()->create([
            'role' => 'admin'
        ]);

        $response = $this->actingAs($admin)->get('/dashboard/usuarios');

        $response->assertStatus(200); // Espera que la página cargue bien
        $response->assertSee('Listado de usuarios'); // Espera ver un texto en la vista
    }
}


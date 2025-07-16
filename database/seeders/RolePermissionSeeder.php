<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::firstOrCreate(["name" => "admin"]);
        $profesionalRole = Role::firstOrCreate(["name" => "profesional"]);
        $clinicaRole = Role::firstOrCreate(["name" => "clinica"]);
        $freeRole = Role::firstOrCreate(["name" => "free"]);
    }
}

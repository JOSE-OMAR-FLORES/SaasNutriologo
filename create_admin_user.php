<?php

// Crear nuevo usuario
$user = new \App\Models\User;
$user->name = 'Admin';
$user->email = 'admin@example.com';
$user->password = bcrypt('password123');
$user->save();

echo "Usuario creado con ID: " . $user->id . "\n";

// Importar el modelo Role
use Spatie\Permission\Models\Role;

// Crear o encontrar el rol admin
$adminRole = Role::findOrCreate('admin');
echo "Rol 'admin' creado/encontrado\n";

// Asignar el rol al usuario
$user->assignRole('admin');
echo "Rol asignado al usuario\n";

// Mostrar los roles del usuario
$roles = $user->getRoleNames();
echo "Roles del usuario: " . $roles->implode(', ') . "\n";

echo "¡Proceso completado exitosamente!\n";

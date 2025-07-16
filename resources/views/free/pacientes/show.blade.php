@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white p-6 shadow rounded">
    <h1 class="text-2xl font-bold mb-4">👤 Detalles del Paciente</h1>

    <div class="space-y-2 text-gray-700">
        <p><strong>Nombre:</strong> {{ $paciente->nombre }}</p>
        <p><strong>Teléfono:</strong> {{ $paciente->telefono }}</p>
        <p><strong>Sexo:</strong> {{ ucfirst($paciente->sexo) }}</p>
        <p><strong>Fecha de nacimiento:</strong> {{ $paciente->fecha_nacimiento }}</p>
        <p><strong>Correo electrónico:</strong> {{ $paciente->email ?? 'No disponible' }}</p>
        <p><strong>Dirección:</strong> {{ $paciente->direccion ?? 'No especificada' }}</p>
    </div>

    <div class="mt-6 flex gap-4">
        <a href="{{ route('free.pacientes.edit', $paciente) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">✏️ Editar</a>
        <a href="{{ route('free.dashboard') }}" class="bg-gray-200 px-4 py-2 rounded hover:bg-gray-300">← Volver</a>
    </div>
</div>
@endsection

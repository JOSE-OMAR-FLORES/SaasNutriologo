@extends('layouts.app')

@section('content')
<form method="POST" action="{{ route(Auth::user()->getRoleNames()->first() . '.pacientes.store') }}" class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow-md space-y-4">
    @csrf

    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Agregar Paciente</h2>

    {{-- Nombre --}}
    <div>
        <label for="nombre" class="block text-gray-700 font-medium mb-1">Nombre:</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>

    {{-- Edad --}}
    <div>
        <label for="edad" class="block text-gray-700 font-medium mb-1">Edad:</label>
        <input type="number" name="edad" id="edad" placeholder="Edad"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>

    {{-- Sexo --}}
    <div>
        <label for="sexo" class="block text-gray-700 font-medium mb-1">Sexo:</label>
        <select name="sexo" id="sexo"
                class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
            <option value="">Seleccionar</option>
            <option value="Masculino">Masculino</option>
            <option value="Femenino">Femenino</option>
            <option value="Otro">Otro</option>
        </select>
    </div>

    {{-- Teléfono --}}
    <div>
        <label for="telefono" class="block text-gray-700 font-medium mb-1">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" placeholder="Teléfono"
               class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500" required>
    </div>

    {{-- Etiquetas --}}
    <div>
        <label class="block text-gray-700 font-medium mb-2">Etiquetas:</label>
        <div class="flex flex-wrap gap-3">
            @foreach($etiquetas as $etiqueta)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="etiquetas[]" value="{{ $etiqueta->id }}"
                           class="text-green-600 focus:ring-green-500">
                    <span class="text-sm text-gray-700">{{ $etiqueta->nombre }}</span>
                </label>
            @endforeach
        </div>
    </div>

    {{-- Botón --}}
    <div class="pt-4">
        <button type="submit"
                class="w-full bg-green-600 hover:bg-green-700 text-white py-2 px-4 rounded-md transition duration-300 shadow">
            Guardar Paciente
        </button>
    </div>
</form>
@endsection

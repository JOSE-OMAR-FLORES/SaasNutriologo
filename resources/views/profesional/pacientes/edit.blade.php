@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-blue-700">Editar Paciente</h2>

    <form method="POST" action="{{ route('profesional.pacientes.update', $paciente) }}">
        @csrf
        @method('PUT')

        {{-- Nombre --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Nombre</label>
            <input type="text" name="nombre" value="{{ old('nombre', $paciente->nombre) }}" required class="w-full border rounded px-3 py-2">
        </div>

        {{-- Edad --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Edad</label>
            <input type="number" name="edad" value="{{ old('edad', $paciente->edad) }}" required class="w-full border rounded px-3 py-2">
        </div>

        {{-- Sexo --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Sexo</label>
            <select name="sexo" required class="w-full border rounded px-3 py-2">
                <option value="Masculino" {{ old('sexo', $paciente->sexo) == 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ old('sexo', $paciente->sexo) == 'Femenino' ? 'selected' : '' }}>Femenino</option>
                <option value="Otro" {{ old('sexo', $paciente->sexo) == 'Otro' ? 'selected' : '' }}>Otro</option>
            </select>
        </div>

        {{-- Teléfono --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Teléfono</label>
            <input type="text" name="telefono" value="{{ old('telefono', $paciente->telefono) }}" required class="w-full border rounded px-3 py-2">
        </div>

        {{-- Etiquetas --}}
        <div class="mb-4">
            <label class="block text-gray-700 font-semibold mb-2">Etiquetas</label>
            <div class="flex flex-wrap gap-3">
                @foreach($etiquetas as $etiqueta)
                    <label class="flex items-center space-x-2">
                        <input 
                            type="checkbox" 
                            name="etiquetas[]" 
                            value="{{ $etiqueta->id }}"
                            class="text-green-600 focus:ring-green-500"
                            {{ in_array($etiqueta->id, old('etiquetas', $paciente->etiquetas->pluck('id')->toArray())) ? 'checked' : '' }}>
                        <span class="text-sm text-gray-700">{{ $etiqueta->nombre }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Botón --}}
        <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700 transition">
            Actualizar
        </button>
    </form>
</div>
@endsection

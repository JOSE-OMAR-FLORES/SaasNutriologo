@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-indigo-600">Editar Nota</h2>

    <form method="POST" action="{{ route('profesional.notas.update', $nota) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Paciente</label>
            <select name="paciente_id" required class="w-full border rounded px-3 py-2">
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $nota->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Fecha</label>
            <input type="date" name="fecha" required class="w-full border rounded px-3 py-2" value="{{ $nota->fecha }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Contenido</label>
            <textarea name="contenido" rows="5" required class="w-full border rounded px-3 py-2">{{ $nota->contenido }}</textarea>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Actualizar Nota</button>
    </form>
</div>
@endsection

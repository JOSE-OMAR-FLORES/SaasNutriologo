@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-indigo-600">Crear Nota</h2>

    <form method="POST" action="{{ route('profesional.notas.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Paciente</label>
            <select name="paciente_id" required class="w-full border rounded px-3 py-2">
                <option value="">Selecciona un paciente</option>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Fecha</label>
            <input type="date" name="fecha" required class="w-full border rounded px-3 py-2" value="{{ date('Y-m-d') }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Contenido</label>
            <textarea name="contenido" rows="5" required class="w-full border rounded px-3 py-2" placeholder="Escribe la nota aquí..."></textarea>
        </div>

        <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded hover:bg-indigo-700">Guardar Nota</button>
    </form>
</div>
@endsection

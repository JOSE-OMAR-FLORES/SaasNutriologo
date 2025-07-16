@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-blue-700">Nuevo Progreso para {{ $paciente->nombre }}</h2>

    <form method="POST" action="{{ route('profesional.progresos.store', $paciente) }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Fecha</label>
            <input type="date" name="fecha" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-semibold">Peso (kg)</label>
                <input type="number" name="peso" step="0.1" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Altura (cm)</label>
                <input type="number" name="altura" step="0.1" class="w-full border rounded px-3 py-2">
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <label class="block text-gray-700 font-semibold">Cintura (cm)</label>
                <input type="number" name="cintura" step="0.1" class="w-full border rounded px-3 py-2">
            </div>
            <div>
                <label class="block text-gray-700 font-semibold">Cadera (cm)</label>
                <input type="number" name="cadera" step="0.1" class="w-full border rounded px-3 py-2">
            </div>
        </div>

        <div class="mt-4">
            <label class="block text-gray-700 font-semibold">Observaciones</label>
            <textarea name="observaciones" rows="3" class="w-full border rounded px-3 py-2"></textarea>
        </div>

        <button type="submit" class="mt-6 w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Guardar</button>
    </form>
</div>
@endsection

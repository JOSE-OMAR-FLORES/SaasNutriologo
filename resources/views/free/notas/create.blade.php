@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">➕ Nueva Nota</h1>

    <form action="{{ route('free.notas.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block font-semibold">Contenido</label>
            <textarea name="contenido" class="w-full border rounded px-3 py-2" rows="4" required></textarea>
        </div>

        <div>
            <label class="block font-semibold">Fecha</label>
            <input type="date" name="fecha" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold">Peso o medida (opcional)</label>
            <input type="text" name="peso_o_medida" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-semibold">Paciente</label>
            <select name="paciente_id" class="w-full border rounded px-3 py-2" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Guardar Nota</button>
    </form>
</div>
@endsection

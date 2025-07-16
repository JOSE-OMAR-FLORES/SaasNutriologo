@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10">
    <h1 class="text-2xl font-bold mb-4">✏️ Editar Nota</h1>

    <form action="{{ route('free.notas.update', $nota) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-semibold">Contenido</label>
            <textarea name="contenido" class="w-full border rounded px-3 py-2" rows="4" required>{{ $nota->contenido }}</textarea>
        </div>

        <div>
            <label class="block font-semibold">Fecha</label>
            <input type="date" name="fecha" class="w-full border rounded px-3 py-2" value="{{ $nota->fecha }}" required>
        </div>

        <div>
            <label class="block font-semibold">Peso o medida (opcional)</label>
            <input type="text" name="peso_o_medida" class="w-full border rounded px-3 py-2" value="{{ $nota->peso_o_medida }}">
        </div>

        <div>
            <label class="block font-semibold">Paciente</label>
            <select name="paciente_id" class="w-full border rounded px-3 py-2" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $nota->paciente_id == $paciente->id ? 'selected' : '' }}>
                        {{ $paciente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Actualizar Nota</button>
    </form>
</div>
@endsection

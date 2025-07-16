@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-emerald-600">Editar Cita</h2>

    <form method="POST" action="{{ route('profesional.citas.update', $cita) }}">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Paciente</label>
            <select name="paciente_id" required class="w-full border rounded px-3 py-2">
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ $paciente->id == $cita->paciente_id ? 'selected' : '' }}>
                        {{ $paciente->nombre }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Fecha</label>
            <input type="date" name="fecha" value="{{ $cita->fecha }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Hora</label>
            <input type="time" name="hora" value="{{ $cita->hora }}" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Motivo</label>
            <textarea name="motivo" rows="3" class="w-full border rounded px-3 py-2" required>{{ $cita->motivo }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Estado</label>
            <select name="estado" required class="w-full border rounded px-3 py-2">
                <option value="Pendiente" {{ $cita->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="Confirmada" {{ $cita->estado == 'Confirmada' ? 'selected' : '' }}>Confirmada</option>
                <option value="Cancelada" {{ $cita->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>

        <button type="submit" class="w-full bg-green-600 text-white py-2 px-4 rounded hover:bg-green-700">Actualizar Cita</button>
    </form>
</div>
@endsection

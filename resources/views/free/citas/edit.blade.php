@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-lg">
    <h1 class="text-3xl font-bold mb-6">Editar Cita</h1>

    <form action="{{ route('free.citas.update', $cita) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label for="fecha" class="block font-semibold mb-1">Fecha:</label>
            <input type="date" name="fecha" id="fecha" value="{{ old('fecha', $cita->fecha) }}" required class="w-full border rounded px-3 py-2" />
            @error('fecha')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="hora" class="block font-semibold mb-1">Hora:</label>
            <input type="time" name="hora" id="hora" value="{{ old('hora', $cita->hora) }}" class="w-full border rounded px-3 py-2" />
            @error('hora')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="motivo" class="block font-semibold mb-1">Motivo:</label>
            <input type="text" name="motivo" id="motivo" value="{{ old('motivo', $cita->motivo) }}" required class="w-full border rounded px-3 py-2" />
            @error('motivo')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="estado" class="block font-semibold mb-1">Estado:</label>
            <select name="estado" id="estado" required class="w-full border rounded px-3 py-2">
                <option value="pendiente" {{ old('estado', $cita->estado) == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="realizada" {{ old('estado', $cita->estado) == 'realizada' ? 'selected' : '' }}>Realizada</option>
                <option value="cancelada" {{ old('estado', $cita->estado) == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
            @error('estado')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <div>
            <label for="paciente_id" class="block font-semibold mb-1">Paciente:</label>
            <select name="paciente_id" id="paciente_id" required class="w-full border rounded px-3 py-2">
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}" {{ old('paciente_id', $cita->paciente_id) == $paciente->id ? 'selected' : '' }}>{{ $paciente->nombre }}</option>
                @endforeach
            </select>
            @error('paciente_id')<p class="text-red-600 text-sm">{{ $message }}</p>@enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">Actualizar</button>
    </form>
</div>
@endsection

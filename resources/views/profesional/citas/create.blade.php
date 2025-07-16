@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-emerald-600">Agendar Cita</h2>

    <form method="POST" action="{{ route('profesional.citas.store') }}">
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
            <input type="date" name="fecha" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Hora</label>
            <input type="time" name="hora" required class="w-full border rounded px-3 py-2">
        </div>

        <div class="mb-4">
    <label class="block text-gray-700 font-semibold">Estado</label>
    <select name="estado" required class="w-full border rounded px-3 py-2">
        <option value="">Selecciona un estado</option>
        <option value="pendiente">Pendiente</option>
        <option value="realizada">Realizada</option>
        <option value="cancelada">Cancelada</option>
    </select>
</div>


        <div class="mb-4">
            <label class="block text-gray-700 font-semibold">Motivo</label>
            <textarea name="motivo" rows="3" class="w-full border rounded px-3 py-2" required></textarea>
        </div>

        <button type="submit" class="w-full bg-emerald-600 text-white py-2 px-4 rounded hover:bg-emerald-700">Guardar Cita</button>
    </form>
</div>
@endsection

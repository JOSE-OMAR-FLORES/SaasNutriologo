@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4 text-indigo-600">Detalle de la Nota</h2>

    <p><strong>Paciente:</strong> {{ $nota->paciente->nombre ?? 'Desconocido' }}</p>
    <p><strong>Fecha:</strong> {{ $nota->fecha }}</p>

    <div class="mt-4 p-4 bg-gray-100 rounded">
        <p>{{ $nota->contenido }}</p>
    </div>

    <a href="{{ route('profesional.notas.edit', $nota) }}" class="inline-block mt-6 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Editar Nota</a>
    <a href="{{ route('profesional.dashboard') }}" class="inline-block mt-6 ml-4 text-indigo-600 hover:underline">Volver al panel</a>
</div>
@endsection

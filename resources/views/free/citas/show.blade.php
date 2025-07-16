@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6 max-w-lg">
    <h1 class="text-3xl font-bold mb-6">Detalles de la Cita</h1>

    <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
    <p><strong>Hora:</strong> {{ $cita->hora ?? 'No especificada' }}</p>
    <p><strong>Motivo:</strong> {{ $cita->motivo }}</p>
    <p><strong>Estado:</strong> {{ ucfirst($cita->estado) }}</p>
    <p><strong>Paciente:</strong> {{ $cita->paciente->nombre ?? 'Sin paciente' }}</p>

    <a href="{{ route('free.dashboard') }}" class="mt-4 inline-block bg-gray-300 px-4 py-2 rounded hover:bg-gray-400">Volver</a>
</div>
@endsection

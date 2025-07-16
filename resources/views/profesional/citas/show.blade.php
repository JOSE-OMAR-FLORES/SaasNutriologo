@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-3xl font-bold mb-4 text-emerald-600">Detalles de la Cita</h2>

    <p><strong>Paciente:</strong> {{ $cita->paciente->nombre ?? 'Desconocido' }}</p>
    <p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
    <p><strong>Hora:</strong> {{ $cita->hora }}</p>
    <p><strong>Motivo:</strong> {{ $cita->motivo }}</p>
    <p><strong>Estado:</strong> {{ $cita->estado }}</p>

    

    <a href="{{ route('profesional.dashboard') }}" class="inline-block mt-4 text-gray-600 hover:underline">Volver al dashboard</a>
</div>
@endsection

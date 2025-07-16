@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto mt-10 bg-white p-6 shadow rounded">
    <h1 class="text-2xl font-bold mb-4">🧾 Nota del {{ $nota->fecha }}</h1>

    <p class="mb-2"><strong>Paciente:</strong> {{ $nota->paciente->nombre }}</p>
    <p class="mb-2"><strong>Contenido:</strong></p>
    <p class="mb-4 whitespace-pre-line">{{ $nota->contenido }}</p>

    @if($nota->peso_o_medida)
        <p class="mb-2"><strong>Peso o medida:</strong> {{ $nota->peso_o_medida }}</p>
    @endif

    <a href="{{ route('free.dashboard') }}" class="text-blue-600 hover:underline">← Volver</a>
</div>
@endsection

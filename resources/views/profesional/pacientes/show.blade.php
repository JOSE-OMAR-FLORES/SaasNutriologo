@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-blue-700 mb-4">Detalles del Paciente</h2>

    <p><strong>Nombre:</strong> {{ $paciente->nombre }}</p>
    <p><strong>Edad:</strong> {{ $paciente->edad }} años</p>
    <p><strong>Sexo:</strong> {{ $paciente->sexo }}</p>
    <p><strong>Teléfono:</strong> {{ $paciente->telefono }}</p>

    {{-- Etiquetas --}}
    <h3 class="text-lg font-semibold text-gray-700 mt-4">Etiquetas:</h3>
    <ul class="flex flex-wrap gap-2 mt-1">
        @forelse($paciente->etiquetas as $etiqueta)
            <li class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm">{{ $etiqueta->nombre }}</li>
        @empty
            <li class="text-sm text-gray-500">Sin etiquetas</li>
        @endforelse
    </ul>

    {{-- Progreso del paciente --}}
    <section class="mt-10">
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-xl font-bold text-gray-700">📈 Progreso</h3>
            <a href="{{ route('profesional.progresos.create', $paciente) }}"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">➕ Agregar Progreso</a>
        </div>

        @if($paciente->progresos->isEmpty())
            <p class="text-gray-500">No hay registros de progreso aún.</p>
        @else
            <table class="min-w-full bg-white rounded-lg overflow-hidden shadow">
                <thead class="bg-gray-200 text-gray-700 text-left">
                    <tr>
                        <th class="px-4 py-2">Fecha</th>
                        <th class="px-4 py-2">Peso</th>
                        <th class="px-4 py-2">Altura</th>
                        <th class="px-4 py-2">Cintura</th>
                        <th class="px-4 py-2">Cadera</th>
                        <th class="px-4 py-2">Observaciones</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @foreach($paciente->progresos as $progreso)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $progreso->fecha }}</td>
                            <td class="px-4 py-2">{{ $progreso->peso ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $progreso->altura ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $progreso->cintura ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $progreso->cadera ?? '-' }}</td>
                            <td class="px-4 py-2">{{ $progreso->observaciones ?? '-' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Gráfica --}}
            <div class="mt-10">
                <h3 class="text-xl font-bold text-gray-700 mb-4">📊 Evolución del Peso</h3>
                <canvas id="pesoChart" class="w-full h-64"></canvas>
                <script>
                    const ctx = document.getElementById('pesoChart').getContext('2d');
                    const pesoChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: {!! json_encode($fechas) !!},
                            datasets: [{
                                label: 'Peso (kg)',
                                data: {!! json_encode($pesos) !!},
                                backgroundColor: 'rgba(56, 189, 248, 0.2)',
                                borderColor: 'rgba(56, 189, 248, 1)',
                                borderWidth: 2,
                                tension: 0.3,
                                fill: true,
                                pointBackgroundColor: 'rgba(56, 189, 248, 1)'
                            }]
                        },
                        options: {
                            responsive: true,
                            scales: {
                                y: {
                                    beginAtZero: false
                                }
                            }
                        }
                    });
                </script>
            </div>
        @endif
    </section>

    <div class="mt-6">
        <a href="{{ route('profesional.pacientes.edit', $paciente) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Editar</a>
        <a href="{{ route('profesional.dashboard') }}" class="ml-4 text-gray-600 hover:underline">Volver</a>
    </div>
</div>
@endsection

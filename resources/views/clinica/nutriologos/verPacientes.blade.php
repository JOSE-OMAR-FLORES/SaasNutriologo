@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6 text-emerald-700">Pacientes por Nutriólogo</h1>

    <div class="mb-4 text-gray-700 font-semibold">
        Total de pacientes en todos los nutriólogos: <span class="text-emerald-600">{{ $totalPacientes }}</span>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border border-gray-300 px-4 py-3 text-left">Nombre del Nutriólogo</th>
                    <th class="border border-gray-300 px-4 py-3 text-left">Tipo Profesional</th>
                    <th class="border border-gray-300 px-4 py-3 text-center">Número de Pacientes</th>
                </tr>
            </thead>
            <tbody>
                @forelse($nutriologos as $nutriologo)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3">{{ $nutriologo->name }}</td>
                        <td class="border border-gray-300 px-4 py-3 capitalize">{{ $nutriologo->getRoleNames()->first() ?? 'N/A' }}</td>
                        <td class="border border-gray-300 px-4 py-3 text-center font-semibold">{{ $nutriologo->pacientes_count }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center py-6 text-gray-500 italic">No hay nutriólogos registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('clinica.dashboard') }}" class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-5 rounded shadow transition">
            ← Volver al Dashboard
        </a>
    </div>
</div>
@endsection

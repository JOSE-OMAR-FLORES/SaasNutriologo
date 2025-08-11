@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4">
  <div class="max-w-4xl mx-auto">
    <!-- Encabezado -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100 mb-8">
      <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-5">
        <div class="flex items-center justify-between">
          <h2 class="text-2xl font-bold text-white flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            Detalles del Paciente
          </h2>
          <span class="bg-blue-800 text-white px-3 py-1 rounded-full text-sm">
            ID: {{ $paciente->id }}
          </span>
        </div>
      </div>
    </div>

    <!-- Información principal -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 p-6 mb-8">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Columna izquierda -->
        <div class="space-y-4">
          <div class="flex items-start">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <div>
              <h3 class="text-sm font-medium text-gray-500">Nombre completo</h3>
              <p class="text-lg font-semibold text-gray-800">{{ $paciente->nombre }}</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
              </svg>
            </div>
            <div>
              <h3 class="text-sm font-medium text-gray-500">Edad</h3>
              <p class="text-lg font-semibold text-gray-800">{{ $paciente->edad }} años</p>
            </div>
          </div>
        </div>

        <!-- Columna derecha -->
        <div class="space-y-4">
          <div class="flex items-start">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </div>
            <div>
              <h3 class="text-sm font-medium text-gray-500">Sexo</h3>
              <p class="text-lg font-semibold text-gray-800">{{ $paciente->sexo }}</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-7a2 2 0 01-2-2v-1M9 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H9a2 2 0 01-2-2V5z" />
              </svg>
            </div>
            <div>
              <h3 class="text-sm font-medium text-gray-500">Teléfono</h3>
              <p class="text-lg font-semibold text-gray-800">{{ $paciente->telefono }}</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Etiquetas -->
      <div class="mt-6 pt-4 border-t border-gray-200">
        <h3 class="text-sm font-medium text-gray-500 mb-2">Etiquetas</h3>
        <div class="flex flex-wrap gap-2">
          @forelse($paciente->etiquetas as $etiqueta)
            <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">{{ $etiqueta->nombre }}</span>
          @empty
            <span class="text-gray-500 text-sm">No hay etiquetas asignadas</span>
          @endforelse
        </div>
      </div>
    </div>

    <!-- Sección de Progreso -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 p-6">
      <div class="flex justify-between items-center mb-6">
        <h3 class="text-xl font-bold text-gray-800 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
          </svg>
          Progreso del Paciente
        </h3>
        <a href="{{ route('profesional.progresos.create', $paciente) }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          Nuevo Registro
        </a>
      </div>

      @if($paciente->progresos->isEmpty())
        <div class="text-center py-8">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          <p class="mt-2 text-gray-500">No hay registros de progreso aún</p>
        </div>
      @else
        <!-- Tabla de progreso -->
        <div class="overflow-x-auto">
          <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
              <tr>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Peso (kg)</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Altura (cm)</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cintura (cm)</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cadera (cm)</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Observaciones</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
              @foreach($paciente->progresos->sortByDesc('fecha') as $progreso)
              <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $progreso->fecha }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $progreso->peso ?? '-' }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $progreso->altura ?? '-' }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $progreso->cintura ?? '-' }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $progreso->cadera ?? '-' }}</td>
                <td class="px-6 py-4 text-sm text-gray-500">{{ $progreso->observaciones ?? '-' }}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

<!-- Gráfica -->
<div class="mt-8">
    <h4 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
        </svg>
        Evolución del Peso
    </h4>
    <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-200" style="height: 400px;">
        <canvas id="pesoChart" style="height: 350px; width: 100%;"></canvas>
    </div>
    <script>
        const ctx = document.getElementById('pesoChart').getContext('2d');
        const pesoChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode($fechas) !!},
                datasets: [{
                    label: 'Peso (kg)',
                    data: {!! json_encode($pesos) !!},
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    borderColor: 'rgba(59, 130, 246, 1)',
                    borderWidth: 2,
                    tension: 0.3,
                    fill: true,
                    pointBackgroundColor: 'rgba(59, 130, 246, 1)',
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false, // Esto evita que la gráfica se distorsione
                scales: {
                    y: {
                        beginAtZero: false,
                        grid: {
                            drawBorder: false
                        },
                        suggestedMax: Math.max(...{!! json_encode($pesos) !!}) * 1.2 // Añade un 20% de espacio arriba
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: 'rgba(0, 0, 0, 0.8)',
                        titleFont: {
                            size: 14
                        },
                        bodyFont: {
                            size: 12
                        }
                    }
                }
            }
        });
    </script>
</div>
      @endif
    </div>
    <!-- Acciones -->
    <div class="mt-6 flex justify-between">
      <a href="{{ route('profesional.pacientes.edit', $paciente) }}" 
         class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
        </svg>
        Editar Paciente
      </a>
      <a href="{{ route('profesional.dashboard') }}" 
         class="text-gray-600 hover:text-gray-800 px-6 py-3 rounded-lg flex items-center transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
        </svg>
        Volver al Panel
      </a>
    </div>
  </div>
</div>
@endsection
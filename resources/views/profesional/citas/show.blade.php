@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-8 px-4">
  <div class="max-w-2xl mx-auto">
    <!-- Encabezado -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-100 mb-8">
      <div class="bg-gradient-to-r from-emerald-600 to-teal-500 px-6 py-5">
        <h2 class="text-2xl font-bold text-white flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          Detalles de la Cita
        </h2>
      </div>
    </div>

    <!-- Contenido -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
      <div class="p-6 space-y-4">
        <!-- Información de la cita -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Paciente -->
          <div class="space-y-1">
            <label class="block text-sm font-medium text-emerald-800">Paciente</label>
            <div class="flex items-center p-3 bg-emerald-50 rounded-lg border border-emerald-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              <span class="text-gray-700">{{ $cita->paciente->nombre ?? 'Desconocido' }}</span>
            </div>
          </div>

          <!-- Fecha -->
          <div class="space-y-1">
            <label class="block text-sm font-medium text-emerald-800">Fecha</label>
            <div class="flex items-center p-3 bg-emerald-50 rounded-lg border border-emerald-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
              <span class="text-gray-700">{{ $cita->fecha }}</span>
            </div>
          </div>

          <!-- Hora -->
          <div class="space-y-1">
            <label class="block text-sm font-medium text-emerald-800">Hora</label>
            <div class="flex items-center p-3 bg-emerald-50 rounded-lg border border-emerald-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              <span class="text-gray-700">{{ $cita->hora }}</span>
            </div>
          </div>

          <!-- Estado -->
          <div class="space-y-1">
            <label class="block text-sm font-medium text-emerald-800">Estado</label>
            <div class="flex items-center p-3 bg-emerald-50 rounded-lg border border-emerald-100">
              <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                {{ $cita->estado == 'Pendiente' ? 'bg-yellow-100 text-yellow-800' : 
                   ($cita->estado == 'Confirmada' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800') }}">
                {{ $cita->estado }}
              </span>
            </div>
          </div>
        </div>

        <!-- Motivo -->
        <div class="space-y-1">
          <label class="block text-sm font-medium text-emerald-800">Motivo</label>
          <div class="p-3 bg-gray-50 rounded-lg border border-gray-200">
            <p class="text-gray-700">{{ $cita->motivo }}</p>
          </div>
        </div>

        <!-- Botones de acción -->
        <div class="pt-4 flex flex-col sm:flex-row gap-3">
          <a href="{{ route('profesional.citas.edit', $cita) }}"
             class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Editar Cita
          </a>
          <a href="{{ route('profesional.dashboard') }}"
             class="flex-1 inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Volver al Dashboard
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
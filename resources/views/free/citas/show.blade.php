@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-emerald-50 to-white py-8 px-4">
  <div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-100">
    <!-- Encabezado -->
    <div class="bg-emerald-600 px-6 py-4">
      <h1 class="text-2xl font-bold text-white flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        Detalles de la Cita
      </h1>
    </div>

    <!-- Contenido -->
    <div class="p-6 space-y-4">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
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
            <span class="text-gray-700">{{ $cita->hora ?? 'No especificada' }}</span>
          </div>
        </div>
      </div>

      <!-- Motivo -->
      <div class="space-y-1">
        <label class="block text-sm font-medium text-emerald-800">Motivo</label>
        <div class="flex items-start p-3 bg-emerald-50 rounded-lg border border-emerald-100">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          <span class="text-gray-700">{{ $cita->motivo }}</span>
        </div>
      </div>

      <!-- Estado y Paciente -->
      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <!-- Estado -->
        <div class="space-y-1">
          <label class="block text-sm font-medium text-emerald-800">Estado</label>
          <div class="flex items-center p-3 bg-emerald-50 rounded-lg border border-emerald-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span class="text-gray-700">{{ ucfirst($cita->estado) }}</span>
          </div>
        </div>

        <!-- Paciente -->
        <div class="space-y-1">
          <label class="block text-sm font-medium text-emerald-800">Paciente</label>
          <div class="flex items-center p-3 bg-emerald-50 rounded-lg border border-emerald-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
            <span class="text-gray-700">{{ $cita->paciente->nombre ?? 'Sin paciente' }}</span>
          </div>
        </div>
      </div>

      <!-- Botón de acción -->
      <div class="pt-4">
        <a href="{{ route('free.dashboard') }}"
           class="w-full inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Volver al Dashboard
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-emerald-50 to-white py-8 px-4">
  <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-100">
    <!-- Encabezado con color -->
    <div class="bg-emerald-600 px-6 py-4">
      <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-white flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          Nota Clínica - {{ $nota->fecha }}
        </h1>
        <span class="bg-emerald-800 text-xs text-white px-3 py-1 rounded-full">
          ID: {{ $nota->id }}
        </span>
      </div>
    </div>

    <!-- Contenido principal -->
    <div class="p-6 space-y-6">
      <!-- Información del paciente -->
      <div class="flex items-start">
        <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <div>
          <h3 class="text-sm font-medium text-gray-500">Paciente</h3>
          <p class="text-lg font-semibold text-gray-800">{{ $nota->paciente->nombre }}</p>
        </div>
      </div>

      <!-- Contenido de la nota -->
      <div class="space-y-2">
        <h3 class="text-sm font-medium text-emerald-800">Contenido de la nota</h3>
        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
          <p class="text-gray-800 whitespace-pre-line">{{ $nota->contenido }}</p>
        </div>
      </div>

      <!-- Peso/Medida si existe -->
      @if($nota->peso_o_medida)
      <div class="flex items-start">
        <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3" />
          </svg>
        </div>
        <div>
          <h3 class="text-sm font-medium text-gray-500">Peso/Medida</h3>
          <p class="text-lg font-semibold text-gray-800">{{ $nota->peso_o_medida }}</p>
        </div>
      </div>
      @endif

      <!-- Sección de acciones -->
      <div class="pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-between gap-3">
        <a href="{{ route('free.dashboard') }}" 
           class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Volver al Dashboard
        </a>
        <div class="flex gap-3">
          <a href="{{ route('free.notas.edit', $nota) }}" 
             class="inline-flex items-center justify-center px-6 py-3 bg-emerald-600 text-white font-medium rounded-lg shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Editar
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
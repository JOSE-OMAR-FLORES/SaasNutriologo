@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4">
  <div class="max-w-2xl mx-auto">
    <!-- Encabezado -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100 mb-8">
      <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-5">
        <h2 class="text-2xl font-bold text-white flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          Detalle de la Nota Clínica
        </h2>
      </div>
    </div>

    <!-- Contenido -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200 p-6 space-y-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-500">Paciente</label>
          <p class="text-lg font-semibold text-gray-800">{{ $nota->paciente->nombre ?? 'Desconocido' }}</p>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-500">Fecha</label>
          <p class="text-lg font-semibold text-gray-800">{{ $nota->fecha }}</p>
        </div>
      </div>

      <div class="space-y-2">
        <label class="block text-sm font-medium text-gray-500">Contenido</label>
        <div class="p-4 bg-gray-50 rounded-lg border border-gray-200">
          <p class="text-gray-800 whitespace-pre-line">{{ $nota->contenido }}</p>
        </div>
      </div>

      <!-- Botones -->
      <div class="pt-4 flex flex-col sm:flex-row gap-3">
        <a href="{{ route('profesional.notas.edit', $nota) }}" 
           class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-center">
          <div class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Editar Nota
          </div>
        </a>
        <a href="{{ route('profesional.dashboard') }}" 
           class="flex-1 inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
          Volver al Panel
        </a>
      </div>
    </div>
  </div>
</div>
@endsection
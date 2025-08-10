@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-8 px-4">
  <div class="max-w-2xl mx-auto">
    <!-- Encabezado -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-100 mb-8">
      <div class="bg-gradient-to-r from-emerald-600 to-teal-500 px-6 py-5">
        <h1 class="text-2xl font-bold text-white flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          Detalle del Nutriólogo
        </h1>
      </div>
    </div>

    <!-- Contenido -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
      <div class="p-6 space-y-6">
        <!-- Información del Nutriólogo -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Nombre -->
          <div class="space-y-1">
            <label class="block text-sm font-medium text-emerald-800">Nombre</label>
            <div class="flex items-center p-3 bg-emerald-50 rounded-lg border border-emerald-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              <span class="text-gray-700">{{ $nutriologo->name }}</span>
            </div>
          </div>

          <!-- Email -->
          <div class="space-y-1">
            <label class="block text-sm font-medium text-emerald-800">Correo electrónico</label>
            <div class="flex items-center p-3 bg-emerald-50 rounded-lg border border-emerald-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <span class="text-gray-700">{{ $nutriologo->email }}</span>
            </div>
          </div>

          <!-- Teléfono -->
          <div class="space-y-1">
            <label class="block text-sm font-medium text-emerald-800">Teléfono</label>
            <div class="flex items-center p-3 bg-emerald-50 rounded-lg border border-emerald-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
              <span class="text-gray-700">{{ $nutriologo->telefono ?? 'No registrado' }}</span>
            </div>
          </div>

          <!-- Especialidad (si existe) -->
          @if(isset($nutriologo->especialidad))
          <div class="space-y-1">
            <label class="block text-sm font-medium text-emerald-800">Especialidad</label>
            <div class="flex items-center p-3 bg-emerald-50 rounded-lg border border-emerald-100">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
              </svg>
              <span class="text-gray-700">{{ $nutriologo->especialidad }}</span>
            </div>
          </div>
          @endif
        </div>

        <!-- Botones de acción -->
        <div class="pt-4 flex flex-col sm:flex-row gap-3">
          <a href="{{ route(Auth::user()->getRoleNames()->first() . '.nutriologos.edit', $nutriologo->id) }}"
             class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
            Editar
          </a>

          <form action="{{ route(Auth::user()->getRoleNames()->first() . '.nutriologos.destroy', $nutriologo->id) }}" method="POST" 
                class="flex-1"
                onsubmit="return confirm('¿Seguro que quieres eliminar este nutriólogo?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-medium py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
              </svg>
              Eliminar
            </button>
          </form>

          <a href="{{ route(Auth::user()->getRoleNames()->first() . '.nutriologos.index') }}"
             class="flex-1 inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Volver
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .transition-all {
    transition: all 0.3s ease;
  }
</style>
@endsection
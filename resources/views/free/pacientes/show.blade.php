@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-emerald-50 to-white py-8 px-4">
  <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-100">
    <!-- Header -->
    <div class="bg-emerald-600 px-6 py-4 flex items-center justify-between">
      <h1 class="text-2xl font-bold text-white flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
        </svg>
        Detalles del Paciente
      </h1>
      <span class="bg-emerald-800 text-xs text-white px-3 py-1 rounded-full">ID: {{ $paciente->id }}</span>
    </div>

    <!-- Content -->
    <div class="p-6">
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Left column -->
        <div class="space-y-4">
          <div class="flex items-start">
            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 mr-4">
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
            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
              </svg>
            </div>
            <div>
              <h3 class="text-sm font-medium text-gray-500">Edad</h3>
              <p class="text-lg font-semibold text-gray-800">{{ $paciente->edad }} años</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </div>
            <div>
              <h3 class="text-sm font-medium text-gray-500">Sexo</h3>
              <p class="text-lg font-semibold text-gray-800">{{ ucfirst($paciente->sexo) }}</p>
            </div>
          </div>

          <div class="flex items-start">
            <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center text-emerald-600 mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-7C9.716 21 3 14.284 3 6V5z" />
              </svg>
            </div>
            <div>
              <h3 class="text-sm font-medium text-gray-500">Teléfono</h3>
              <p class="text-lg font-semibold text-gray-800">{{ $paciente->telefono }}</p>
            </div>
          </div>
        </div>

        <!-- Right column: Etiquetas (si quieres mostrar) -->
        <div class="space-y-4">
          <h3 class="text-lg font-semibold text-emerald-700 border-b border-emerald-300 pb-2">Etiquetas</h3>
          @if($paciente->etiquetas->count())
            <ul class="list-disc list-inside space-y-1">
              @foreach($paciente->etiquetas as $etiqueta)
                <li class="text-gray-700">{{ $etiqueta->nombre }}</li>
              @endforeach
            </ul>
          @else
            <p class="text-gray-500 italic">No hay etiquetas asignadas</p>
          @endif
        </div>
      </div>

      <!-- Actions -->
      <div class="mt-8 pt-6 border-t border-gray-200 flex flex-col sm:flex-row justify-end gap-3">
        <a href="{{ route(Auth::user()->getRoleNames()->first() . '.pacientes.edit', $paciente) }}"
           class="inline-flex items-center justify-center px-6 py-3 bg-emerald-600 text-white font-medium rounded-lg shadow-sm hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
          </svg>
          Editar Paciente
        </a>
        <a href="{{ route(Auth::user()->getRoleNames()->first() . '.dashboard') }}"
           class="inline-flex items-center justify-center px-6 py-3 border border-gray-300 text-gray-700 font-medium rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all">
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

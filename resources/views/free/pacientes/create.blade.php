@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-emerald-50 to-white py-8 px-4">
  <form method="POST" action="{{ route(Auth::user()->getRoleNames()->first() . '.pacientes.store') }}" 
        class="max-w-xl mx-auto bg-white p-8 rounded-xl shadow-lg border border-emerald-100 space-y-6">
    @csrf

    <div class="text-center mb-6">
      <h2 class="text-3xl font-bold text-emerald-800">Agregar Nuevo Paciente</h2>
      <p class="text-emerald-600 mt-1">Completa los datos del paciente</p>
    </div>

    {{-- Nombre --}}
    <div class="space-y-1">
      <label for="nombre" class="block text-sm font-medium text-emerald-800">Nombre:</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre completo"
               class="block w-full pl-10 border border-emerald-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
               required>
      </div>
    </div>

    {{-- Edad --}}
    <div class="space-y-1">
      <label for="edad" class="block text-sm font-medium text-emerald-800">Edad:</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 15.546c-.523 0-1.046.151-1.5.454a2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.704 2.704 0 00-3 0 2.704 2.704 0 01-3 0 2.701 2.701 0 00-1.5-.454M9 6v2m3-2v2m3-2v2M9 3h.01M12 3h.01M15 3h.01M21 21v-7a2 2 0 00-2-2H5a2 2 0 00-2 2v7h18zm-3-9v-2a2 2 0 00-2-2H8a2 2 0 00-2 2v2h12z" />
          </svg>
        </div>
        <input type="number" name="edad" id="edad" placeholder="Edad"
               class="block w-full pl-10 border border-emerald-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
               required>
      </div>
    </div>

    {{-- Sexo --}}
    <div class="space-y-1">
      <label for="sexo" class="block text-sm font-medium text-emerald-800">Sexo:</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
        <select name="sexo" id="sexo"
                class="block w-full pl-10 border border-emerald-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 appearance-none transition"
                required>
          <option value="">Seleccionar</option>
          <option value="Masculino">Masculino</option>
          <option value="Femenina">Femenina</option>
          <option value="Otro">Otro</option>
        </select>
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
          <svg class="h-5 w-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
          </svg>
        </div>
      </div>
    </div>

    {{-- Teléfono --}}
    <div class="space-y-1">
      <label for="telefono" class="block text-sm font-medium text-emerald-800">Teléfono:</label>
      <div class="relative">
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
          <svg class="h-5 w-5 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-7C9.716 21 3 14.284 3 6V5z" />
          </svg>
        </div>
        <input type="text" name="telefono" id="telefono" placeholder="Número de teléfono"
               class="block w-full pl-10 border border-emerald-200 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition"
               required>
      </div>
    </div>

    {{-- Etiquetas --}}
    <div class="space-y-2">
      <label class="block text-sm font-medium text-emerald-800">Etiquetas:</label>
      <div class="flex flex-wrap gap-3">
        @foreach($etiquetas as $etiqueta)
          <label class="inline-flex items-center">
            <input type="checkbox" name="etiquetas[]" value="{{ $etiqueta->id }}"
                   class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-emerald-300 rounded">
            <span class="ml-2 text-sm text-gray-700">{{ $etiqueta->nombre }}</span>
          </label>
        @endforeach
      </div>
    </div>

    {{-- Botón --}}
    <div class="pt-6">
      <button type="submit"
              class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-medium py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2">
        <div class="flex items-center justify-center">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-3m-1 4l-3 3m0 0l-3-3m3 3V4" />
          </svg>
          Guardar Paciente
        </div>
      </button>
    </div>
  </form>
</div>

<style>
  select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%2334d399' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    print-color-adjust: exact;
  }
</style>
@endsection
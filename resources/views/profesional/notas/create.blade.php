@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-blue-50 to-white py-8 px-4">
  <div class="max-w-xl mx-auto">
    <!-- Encabezado -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100 mb-8">
      <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 px-6 py-5">
        <h2 class="text-2xl font-bold text-white flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          Crear Nueva Nota Clínica
        </h2>
      </div>
    </div>

    <!-- Formulario -->
    <div class="bg-white rounded-xl shadow-md overflow-hidden border border-gray-200">
      <form method="POST" action="{{ route('profesional.notas.store') }}" class="p-6 space-y-6">
        @csrf

        <!-- Paciente -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-gray-700">Paciente</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
            </div>
            <select name="paciente_id" required class="block w-full pl-10 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 appearance-none transition">
              <option value="">Selecciona un paciente</option>
              @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Fecha -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-gray-700">Fecha</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
            <input type="date" name="fecha" required value="{{ date('Y-m-d') }}" class="block w-full pl-10 border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition">
          </div>
        </div>

        <!-- Contenido -->
        <div class="space-y-2">
          <label class="block text-sm font-medium text-gray-700">Contenido</label>
          <textarea name="contenido" rows="5" required class="block w-full border border-gray-300 rounded-lg px-4 py-3 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" placeholder="Escribe la nota clínica aquí..."></textarea>
        </div>

        <!-- Botones -->
        <div class="pt-4">
          <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-medium py-3 px-6 rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
            <div class="flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
              </svg>
              Guardar Nota
            </div>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>

<style>
  select {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23636bff' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 0.5rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    print-color-adjust: exact;
  }
</style>
@endsection
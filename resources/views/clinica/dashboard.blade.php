@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-8 px-4">
  <!-- Header del Dashboard -->
  <div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 mb-8">
      <div class="bg-gradient-to-r from-emerald-600 to-teal-500 px-6 py-5">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <div class="mb-4 md:mb-0">
            <h1 class="text-2xl md:text-3xl font-bold text-white flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              Panel de Administración
            </h1>
            <p class="text-emerald-100 mt-1">Gestión completa del sistema nutricional</p>
          </div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="flex items-center px-4 py-2 bg-white text-red-600 rounded-lg font-medium hover:bg-red-50 transition-all transform hover:scale-105 shadow-sm border border-red-200">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
              </svg>
              Cerrar sesión
            </button>
          </form>
        </div>
      </div>
      
      <div class="p-6">
        <p class="text-gray-700">Bienvenido, administrador. Aquí puedes gestionar todos los aspectos del sistema.</p>
      </div>
    </div>

    <!-- Estadísticas Rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
      <!-- Total Usuarios -->
      <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-400 hover:shadow-lg transition-all">
        <div class="flex items-center">
          <div class="p-3 bg-blue-100 rounded-full mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-500 text-sm font-medium">Total Usuarios</h3>
            <p class="text-2xl font-bold text-blue-600">1,248</p>
          </div>
        </div>
      </div>
      
      <!-- Nutriólogos -->
      <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-emerald-400 hover:shadow-lg transition-all">
        <div class="flex items-center">
          <div class="p-3 bg-emerald-100 rounded-full mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-500 text-sm font-medium">Nutriólogos</h3>
            <p class="text-2xl font-bold text-emerald-600">42</p>
          </div>
        </div>
      </div>
      
      <!-- Pacientes Activos -->
      <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-400 hover:shadow-lg transition-all">
        <div class="flex items-center">
          <div class="p-3 bg-purple-100 rounded-full mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-500 text-sm font-medium">Pacientes Activos</h3>
            <p class="text-2xl font-bold text-purple-600">856</p>
          </div>
        </div>
      </div>
      
      <!-- Citas Hoy -->
      <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-amber-400 hover:shadow-lg transition-all">
        <div class="flex items-center">
          <div class="p-3 bg-amber-100 rounded-full mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-500 text-sm font-medium">Citas Hoy</h3>
            <p class="text-2xl font-bold text-amber-600">28</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Acciones Rápidas -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
      <a href="#" class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-all transform hover:-translate-y-1 text-center group">
        <div class="mx-auto w-12 h-12 bg-blue-50 rounded-full flex items-center justify-center mb-3 group-hover:bg-blue-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
        <h3 class="font-medium text-gray-800 group-hover:text-blue-600 transition">Gestionar Usuarios</h3>
      </a>
      
      <a href="#" class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-all transform hover:-translate-y-1 text-center group">
        <div class="mx-auto w-12 h-12 bg-emerald-50 rounded-full flex items-center justify-center mb-3 group-hover:bg-emerald-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
          </svg>
        </div>
        <h3 class="font-medium text-gray-800 group-hover:text-emerald-600 transition">Administrar Nutriólogos</h3>
      </a>
      
      <a href="#" class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-all transform hover:-translate-y-1 text-center group">
        <div class="mx-auto w-12 h-12 bg-purple-50 rounded-full flex items-center justify-center mb-3 group-hover:bg-purple-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
          </svg>
        </div>
        <h3 class="font-medium text-gray-800 group-hover:text-purple-600 transition">Ver Todos los Pacientes</h3>
      </a>
      
      <a href="#" class="bg-white p-6 rounded-lg shadow-md border border-gray-200 hover:shadow-lg transition-all transform hover:-translate-y-1 text-center group">
        <div class="mx-auto w-12 h-12 bg-amber-50 rounded-full flex items-center justify-center mb-3 group-hover:bg-amber-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
        </div>
        <h3 class="font-medium text-gray-800 group-hover:text-amber-600 transition">Calendario de Citas</h3>
      </a>
    </div>

    <!-- Sección de Actividad Reciente -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 mb-8">
      <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          Actividad Reciente
        </h2>
      </div>
      <div class="divide-y divide-gray-100">
        <div class="p-4 hover:bg-gray-50 transition">
          <div class="flex items-center">
            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
              </svg>
            </div>
            <div>
              <p class="text-sm font-medium text-gray-800">Nuevo usuario registrado</p>
              <p class="text-xs text-gray-500">Juan Pérez - Nutriólogo · Hace 15 minutos</p>
            </div>
          </div>
        </div>
        
        <div class="p-4 hover:bg-gray-50 transition">
          <div class="flex items-center">
            <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <div>
              <p class="text-sm font-medium text-gray-800">Cita confirmada</p>
              <p class="text-xs text-gray-500">María González con Dr. Rodríguez · Hoy 10:30 AM</p>
            </div>
          </div>
        </div>
        
        <div class="p-4 hover:bg-gray-50 transition">
          <div class="flex items-center">
            <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center text-purple-600 font-bold mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
              </svg>
            </div>
            <div>
              <p class="text-sm font-medium text-gray-800">Nota clínica actualizada</p>
              <p class="text-xs text-gray-500">Paciente: Carlos Sánchez · Ayer</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
  .hover-scale:hover {
    transform: scale(1.05);
  }
  
  .transition-all {
    transition: all 0.3s ease;
  }
</style>
@endsection
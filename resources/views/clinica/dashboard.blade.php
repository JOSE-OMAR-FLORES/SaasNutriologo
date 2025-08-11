@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-10 px-6">
  <div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-lg border border-gray-200 mb-10">
      <div class="bg-gradient-to-r from-emerald-600 to-teal-500 px-8 py-6 flex flex-col md:flex-row justify-between items-center">
        <div class="flex items-center space-x-4 mb-4 md:mb-0">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
          <div>
            <h1 class="text-4xl font-extrabold text-white leading-tight">Panel de Administración</h1>
            <p class="text-emerald-200 mt-1 text-lg">Gestión completa del sistema nutricional</p>
          </div>
        </div>
        <!-- Opcional: botón logout o perfil -->
      </div>
      <div class="p-8">
        <p class="text-gray-700 text-xl font-medium">Bienvenido, administrador. Aquí puedes gestionar todos los aspectos del sistema.</p>
      </div>
    </div>

    <!-- Cards de resumen en 3 columnas iguales -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
      {{-- Total de usuarios --}}
      <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-5 border border-gray-200 hover:shadow-2xl transition cursor-pointer group">
        <div class="bg-emerald-600 p-4 rounded-full text-white group-hover:bg-emerald-700 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M9 20H4v-2a3 3 0 015.356-1.857M15 11a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Total de usuarios</p>
          <p class="text-4xl font-extrabold text-gray-900">{{ $totalUsuarios }}</p>
        </div>
      </div>

      {{-- Nutriólogos --}}
      <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-5 border border-gray-200 hover:shadow-2xl transition cursor-pointer group">
        <div class="bg-emerald-500 p-4 rounded-full text-white group-hover:bg-emerald-600 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A8.959 8.959 0 0112 15c2.674 0 5.117 1.172 6.879 3.041M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Nutriólogos</p>
          <p class="text-4xl font-extrabold text-gray-900">
            {{ $totalNutriologos }} 
            <span class="text-base font-medium text-gray-400">(max {{ $maxNutriologos }})</span>
          </p>
        </div>
      </div>

      {{-- Suscripción --}}
      <div class="bg-white shadow-lg rounded-xl p-6 flex items-center space-x-5 border border-gray-200 hover:shadow-2xl transition cursor-pointer group">
        <div class="bg-emerald-300 p-4 rounded-full text-white group-hover:bg-emerald-400 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
        </div>
        <div>
          <p class="text-sm font-semibold text-gray-500 uppercase tracking-wide">Días de suscripción restantes</p>
          <p class="text-4xl font-extrabold text-gray-900">30</p>
        </div>
      </div>
    </div>

    <!-- Botón debajo centrado y ancho controlado -->
    <div class="mt-12 flex justify-center">
      <a href="{{ route('clinica.nutriologos.index') }}" class="w-full max-w-sm md:max-w-md flex items-center justify-center space-x-3 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-8 rounded-xl shadow-lg transition">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
          <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0z" />
          <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0 0H8m4 0h4" />
        </svg>
        <span>Gestionar usuarios</span>
      </a>
    </div>
  </div>
</div>
@endsection

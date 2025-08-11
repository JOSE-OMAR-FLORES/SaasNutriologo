@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-gray-100 py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md mx-auto">
    <!-- Tarjeta de pago -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-emerald-100">
      <!-- Encabezado -->
      <div class="bg-gradient-to-r from-emerald-600 to-teal-500 px-6 py-5">
        <h2 class="text-2xl font-bold text-white text-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 inline-block mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
          </svg>
          Confirmar Pago
        </h2>
      </div>

      <!-- Contenido -->
      <div class="p-6 space-y-6">
        <!-- Resumen del plan -->
        <div class="bg-emerald-50 rounded-lg p-4 border border-emerald-100">
          <div class="flex justify-between items-center">
            <div>
              <h3 class="font-medium text-emerald-800">Plan seleccionado</h3>
              <p class="text-sm text-gray-600">Suscripción mensual</p>
            </div>
            <span class="text-xl font-bold text-emerald-600">{{ ucfirst($plan) }}</span>
          </div>
        </div>

        <!-- Detalles de pago simulado -->
        <div class="space-y-3">
          <p class="text-center text-gray-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            Este es un pago simulado
          </p>

          <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
            <div class="flex items-center justify-center space-x-4">
              <div class="flex-1">
                <div class="h-10 bg-gray-200 rounded animate-pulse"></div>
              </div>
              <div class="flex-1">
                <div class="h-10 bg-gray-200 rounded animate-pulse"></div>
              </div>
              <div class="flex-1">
                <div class="h-10 bg-gray-200 rounded animate-pulse"></div>
              </div>
              <div class="flex-1">
                <div class="h-10 bg-gray-200 rounded animate-pulse"></div>
              </div>
            </div>
            <div class="mt-4 flex justify-between">
              <div class="h-4 bg-gray-200 rounded w-1/4 animate-pulse"></div>
              <div class="h-4 bg-gray-200 rounded w-1/4 animate-pulse"></div>
            </div>
          </div>
        </div>

        <!-- Botón de pago -->
        <form method="POST" action="{{ route('pago.procesar') }}" class="pt-4">
          @csrf
          <button type="submit" 
                  class="w-full flex justify-center items-center px-6 py-3 border border-transparent rounded-md shadow-sm text-lg font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all transform hover:-translate-y-0.5 hover:shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Confirmar Pago y Crear Cuenta
          </button>
        </form>

        <!-- Información adicional -->
        <p class="text-xs text-center text-gray-500 mt-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 inline-block mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          No se realizarán cargos reales. Esta es una simulación del proceso.
        </p>
      </div>
    </div>
  </div>
</div>

<style>
  .animate-pulse {
    animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
  }
  @keyframes pulse {
    0%, 100% { opacity: 1; }
    50% { opacity: 0.5; }
  }
  .transition-all {
    transition: all 0.3s ease;
  }
</style>
@endsection
@extends('layouts.app')

@section('content')
<section class="relative bg-gradient-to-b from-gray-50 to-white py-16 md:py-24">
  <!-- Fondo sutil -->
  <div class="absolute inset-0 z-0 opacity-10">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80')] bg-cover bg-center"></div>
  </div>

  <div class="container mx-auto px-4 max-w-2xl relative z-10">
    <!-- Tarjeta de contacto -->
    <div class="bg-white p-8 md:p-10 rounded-2xl shadow-lg border border-gray-100">
      <!-- Encabezado -->
      <div class="text-center mb-8">
        <h2 class="text-3xl md:text-4xl font-bold text-emerald-600 mb-2">Contáctanos</h2>
        <p class="text-gray-600">¿Tienes dudas? Escríbenos y te responderemos pronto</p>
      </div>

      <!-- Formulario -->
      <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf
        
        <!-- Campo Nombre -->
        <div class="animate-fade-in-up">
          <label for="nombre" class="block text-sm font-medium text-gray-700 mb-1">Nombre completo</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
              </svg>
            </div>
            <input type="text" id="nombre" name="nombre" required 
                   class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-3">
          </div>
        </div>

        <!-- Campo Email -->
        <div class="animate-fade-in-up delay-100">
          <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
              </svg>
            </div>
            <input type="email" id="email" name="email" required 
                   class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-3">
          </div>
        </div>

        <!-- Campo Teléfono -->
        <div class="animate-fade-in-up delay-150">
          <label for="telefono" class="block text-sm font-medium text-gray-700 mb-1">Teléfono</label>
          <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
              </svg>
            </div>
            <input type="tel" id="telefono" name="telefono" placeholder="+52 55 1234 5678" required 
                   class="pl-10 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-3">
          </div>
        </div>

        <!-- Campo Plan -->
        <div class="animate-fade-in-up delay-200">
          <label for="plan" class="block text-sm font-medium text-gray-700 mb-1">Plan de interés</label>
          <div class="relative">
            <select id="plan" name="plan" required 
                    class="appearance-none pl-3 pr-10 block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 py-3">
              <option value="" disabled selected>Selecciona un plan</option>
              <option value="Gratis">Gratis</option>
              <option value="Profesional">Profesional</option>
              <option value="Clínica">Clínica</option>
            </select>
            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
              <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
              </svg>
            </div>
          </div>
        </div>

        <!-- Campo Nutriólogo -->
        <div class="animate-fade-in-up delay-250">
          <label class="block text-sm font-medium text-gray-700 mb-2">¿Eres nutriólogo?</label>
          <div class="flex items-center gap-6">
            <label class="inline-flex items-center">
              <input type="radio" name="nutriologo" id="si" value="Sí" required 
                     class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300">
              <span class="ml-2 text-gray-700">Sí</span>
            </label>
            <label class="inline-flex items-center">
              <input type="radio" name="nutriologo" id="no" value="No" 
                     class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300">
              <span class="ml-2 text-gray-700">No</span>
            </label>
          </div>
        </div>

        <!-- Campo Mensaje -->
        <div class="animate-fade-in-up delay-300">
          <label for="mensaje" class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label>
          <textarea id="mensaje" name="mensaje" rows="4" 
                    class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-emerald-500 focus:ring-emerald-500 p-3"></textarea>
        </div>

        <!-- Checkbox Consentimiento -->
        <div class="animate-fade-in-up delay-350">
          <div class="flex items-start">
            <div class="flex items-center h-5">
              <input id="consentimiento" name="consentimiento" type="checkbox" required 
                     class="h-4 w-4 rounded border-gray-300 text-emerald-600 focus:ring-emerald-500">
            </div>
            <label for="consentimiento" class="ml-2 text-sm text-gray-600">
              Acepto el tratamiento de mis datos conforme a la <a href="{{ route('terminos') }}" target="_blank" class="text-emerald-600 underline hover:text-emerald-700">política de privacidad</a>.
            </label>
          </div>
        </div>

        <!-- Botón de enviar -->
        <div class="animate-fade-in-up delay-400">
          <button type="submit" 
                  class="w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-4 rounded-lg shadow-md hover:shadow-lg transition-all transform hover:scale-[1.01]">
            Enviar mensaje
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<!-- Animaciones -->
<style>
  @keyframes fade-in-up {
    0% { opacity: 0; transform: translateY(20px); }
    100% { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in-up {
    animation: fade-in-up 0.6s ease-out forwards;
  }
  .delay-100 {
    animation-delay: 0.1s;
  }
  .delay-150 {
    animation-delay: 0.15s;
  }
  .delay-200 {
    animation-delay: 0.2s;
  }
  .delay-250 {
    animation-delay: 0.25s;
  }
  .delay-300 {
    animation-delay: 0.3s;
  }
  .delay-350 {
    animation-delay: 0.35s;
  }
  .delay-400 {
    animation-delay: 0.4s;
  }
</style>
@endsection
@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 relative overflow-hidden">
  <!-- Fondo estilo WhatsApp en verdes -->
  <div class="absolute inset-0 z-0 opacity-20">
    <div class="absolute inset-0 bg-[url('https://i.imgur.com/JQ9pXmz.png')] bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-100/30 to-white"></div>
  </div>

  <!-- Tarjeta de registro -->
  <div class="relative z-10 bg-white/95 backdrop-blur-sm rounded-xl shadow-xl overflow-hidden w-full max-w-md mx-4 border border-gray-200 animate-fade-in">
    <!-- Encabezado con gradiente -->
    <div class="bg-gradient-to-r from-emerald-500 to-green-600 py-6 px-8 text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
      </svg>
      <h2 class="text-2xl font-bold text-white mt-3">Crear cuenta</h2>
    </div>

    <!-- Formulario -->
    <form method="POST" action="{{ route('register') }}" class="p-8">
      @csrf

      <!-- Campo Nombre -->
      <div class="mb-6">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nombre completo</label>
        <div class="relative rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
          </div>
          <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus
                 class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md placeholder-gray-400 transition duration-150 @error('name') border-red-500 @enderror">
          @error('name')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Campo Email -->
      <div class="mb-6">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo electrónico</label>
        <div class="relative rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </div>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required
                 class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md placeholder-gray-400 transition duration-150 @error('email') border-red-500 @enderror">
          @error('email')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Campo Contraseña -->
      <div class="mb-6">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Contraseña</label>
        <div class="relative rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
            </svg>
          </div>
          <input type="password" id="password" name="password" required
                 class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md placeholder-gray-400 transition duration-150 @error('password') border-red-500 @enderror">
          @error('password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Confirmar Contraseña -->
      <div class="mb-6">
        <label for="password-confirm" class="block text-sm font-medium text-gray-700 mb-2">Confirmar contraseña</label>
        <div class="relative rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7z"/>
            </svg>
          </div>
          <input type="password" id="password-confirm" name="password_confirmation" required
                 class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md placeholder-gray-400 transition duration-150">
        </div>
      </div>

      <!-- Selección de Plan -->
      <div class="mb-6">
        <label for="plan" class="block text-sm font-medium text-gray-700 mb-2">Selecciona un plan</label>
        <div class="relative rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
            </svg>
          </div>
          <select id="plan" name="plan" required
                  class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md placeholder-gray-400 transition duration-150 appearance-none">
            <option value="" disabled selected>Selecciona un plan</option>
            <option value="free">Free</option>
            <option value="profesional">Profesional</option>
            <option value="clinica">Clínica</option>
          </select>
          <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
            </svg>
          </div>
        </div>
      </div>

      <!-- Términos y condiciones -->
      <div class="mb-6">
        <div class="flex items-start">
          <div class="flex items-center h-5">
            <input id="terms" name="terms" type="checkbox" required 
                   class="focus:ring-emerald-500 h-4 w-4 text-emerald-600 border-gray-300 rounded">
          </div>
          <label for="terms" class="ml-2 block text-sm text-gray-700">
            Acepto los <a href="{{ route('terminos') }}" target="_blank" class="text-emerald-600 hover:text-emerald-700 hover:underline">términos y condiciones</a>
          </label>
        </div>
        @error('terms')
          <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <!-- Botón de Registro -->
      <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150">
        Registrarse
      </button>

      <!-- Enlace de login -->
      <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
          ¿Ya tienes cuenta?
          <a href="{{ route('login') }}" class="font-medium text-emerald-600 hover:text-emerald-500">
            Iniciar sesión
          </a>
        </p>
      </div>
    </form>
  </div>
</div>

<!-- Animación suave -->
<style>
  @keyframes fade-in {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
  }
  .animate-fade-in {
    animation: fade-in 0.5s ease-out forwards;
  }
</style>
@endsection
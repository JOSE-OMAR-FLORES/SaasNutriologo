@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 relative overflow-hidden">
  <!-- Fondo estilo WhatsApp en verdes -->
  <div class="absolute inset-0 z-0 opacity-150">
    <div class="absolute inset-0 bg-[url('https://i.imgur.com/JQ9pXmz.png')] bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-emerald-100/30 to-white"></div>
  </div>

  <!-- Tarjeta de login -->
  <div class="relative z-10 bg-white/95 backdrop-blur-sm rounded-xl shadow-xl overflow-hidden w-full max-w-md mx-4 border border-gray-200 animate-fade-in">
    <!-- Encabezado con gradiente -->
    <div class="bg-gradient-to-r from-emerald-500 to-green-600 py-6 px-8 text-center">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 3.517-1.009 6.799-2.753 9.571m-3.44-2.04l.054-.09A13.916 13.916 0 008 11a4 4 0 118 0c0 1.017-.07 2.019-.203 3m-2.118 6.844A21.88 21.88 0 0015.171 17m3.839 1.132c.645-2.266.99-4.659.99-7.132A8 8 0 008 4.07M3 15.364c.64-1.319 1-2.8 1-4.364 0-1.457.39-2.823 1.07-4" />
      </svg>
      <h2 class="text-2xl font-bold text-white mt-3">Iniciar sesión</h2>
    </div>

    <!-- Formulario -->
    <form method="POST" action="{{ route('login') }}" class="p-8">
      @csrf

      <!-- Campo Email -->
      <div class="mb-6">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Correo electrónico</label>
        <div class="relative rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
          </div>
          <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                 class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md placeholder-gray-400 transition duration-150">
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
                 class="focus:ring-emerald-500 focus:border-emerald-500 block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-md placeholder-gray-400 transition duration-150">
          @error('password')
            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
          @enderror
        </div>
      </div>

      <!-- Opciones -->
      <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
          <input id="remember" name="remember" type="checkbox" class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded">
          <label for="remember" class="ml-2 block text-sm text-gray-700">
            Recordar sesión
          </label>
        </div>
        <div class="text-sm">
          <a href="#" class="font-medium text-emerald-600 hover:text-emerald-500">
            ¿Olvidaste tu contraseña?
          </a>
        </div>
      </div>

      <!-- Botón de Login -->
      <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-emerald-600 hover:bg-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition duration-150">
        Entrar
      </button>

      <!-- Enlace de registro -->
      <div class="mt-6 text-center">
        <p class="text-sm text-gray-600">
          ¿No tienes cuenta?
          <a href="{{ route('register') }}" class="font-medium text-emerald-600 hover:text-emerald-500">
            Regístrate
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
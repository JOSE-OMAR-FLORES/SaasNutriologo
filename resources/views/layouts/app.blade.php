<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Nutricitas') }}</title>

  <!-- Fuentes y Assets -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-50 font-sans antialiased">
  <div id="app">
    <!-- Navbar Mejorado -->
    <nav class="bg-white shadow-lg sticky top-0 z-50 border-b border-gray-100">
      <div class="container mx-auto px-4">
        <div class="flex justify-between items-center h-16">
          <!-- Logo -->
          <div class="flex items-center">
            <a href="{{ url('/') }}" class="flex items-center">
              
              <span class="ml-2 text-xl font-bold text-gray-800">Nutricitas</span>
            </a>
          </div>

          <!-- Menú Derecha -->
          <div class="flex items-center space-x-6">
            @auth
              @if(Auth::user()->hasRole('profesional'))
                <a href="{{ route('profesional.dashboard') }}" class="hidden md:block text-gray-600 hover:text-emerald-600 px-3 py-2 font-medium transition-colors">
                  Dashboard
                </a>
 
              @endif

              <!-- Menú Usuario -->
              <div class="ml-4 relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                  <span class="text-gray-700">{{ Auth::user()->name }}</span>
                  <svg class="h-5 w-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                  </svg>
                </button>

                <!-- Dropdown -->
                <div x-show="open" @click.away="open = false" 
                     class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 py-1 z-50">
                  <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                      Cerrar Sesión
                    </button>
                  </form>
                </div>
              </div>
            @else
              <a href="{{ route('login') }}" class="text-gray-600 hover:text-emerald-600 px-3 py-2 font-medium transition-colors">
                Iniciar Sesión
              </a>
              <a href="{{ route('register') }}" class="bg-emerald-600 hover:bg-emerald-700 text-white px-4 py-2 rounded-md font-medium transition-colors shadow-sm">
                Registrarse
              </a>
            @endauth
          </div>
        </div>
      </div>
    </nav>

    <main class="py-8">
      @yield('content')
    </main>
  </div>
</body>
</html>
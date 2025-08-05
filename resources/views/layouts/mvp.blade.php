<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Mi App') }}</title>

  <!-- Fonts y Tailwind -->
  <link rel="dns-prefetch" href="//fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="//unpkg.com/alpinejs" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



</head>
<body class="bg-gray-50">
  <div id="app">
    <nav class="bg-white border-b shadow-sm py-3">
      <div class="container mx-auto flex justify-between items-center px-4">
        <a class="text-xl font-bold text-green-700" href="{{ url('/') }}">
          {{ config('app.name', 'Laravel') }}
        </a>

        <div class="flex gap-4 items-center">
          @auth
            {{-- Menú según rol --}}
            @if(Auth::user()->hasRole('profesional'))
              <a href="{{ route('profesional.dashboard') }}" class="text-gray-700 hover:text-blue-600">Dashboard Profesional</a>
              {{-- " class="text-gray-700 hover:text-blue-600">Pacientes</a>
              <a href="{{ route('profesional.citas.index') }}" class="text-gray-700 hover:text-blue-600">Citas</a>
              <a href="{{ route('profesional.notas.index') }}" class="text-gray-700 hover:text-blue-600">Notas</a> --}}
            @endif

            {{-- Cierre de sesión --}}
            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button type="submit" class="ml-4 text-red-500 hover:underline">Salir</button>
            </form>
          @else
            <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500">Login</a>
            <a href="{{ route('register') }}" class="ml-2 text-gray-700 hover:text-blue-500">Registrarse</a>
          @endauth
        </div>
      </div>
    </nav>

    <main class="py-6 px-4">
      @yield('content')
    </main>
  </div>
</body>
</html>

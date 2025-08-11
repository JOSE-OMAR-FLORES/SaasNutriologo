@extends('layouts.app')

@section('content')


<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-8 px-4">
  <div class="max-w-7xl mx-auto">
    <!-- Header -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-blue-100 mb-8">
      <div class="bg-gradient-to-r from-blue-600 to-blue-500 px-6 py-5">
        <div class="flex flex-col md:flex-row justify-between items-center">
          <div class="mb-4 md:mb-0">
            <h1 class="text-2xl md:text-3xl font-bold text-white flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
              </svg>
              Panel Profesional
            </h1>
            <p class="text-blue-100 mt-1">Gestión avanzada de pacientes, citas y progreso</p>
          </div>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
   
          </form>
        </div>
      </div>
    </div>
    <!-- Contador en Navbar, justo antes del menú de usuario -->
<div class="mb-0 text-sm text-gray-500 italic pr-4 flex items-center" style="min-width: 130px; justify-content: flex-end; font-feature-settings: 'tnum';">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
    <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
  </svg>
  Próximo pago: <span id="countdown" class="font-mono ml-1 text-emerald-700"></span>
</div>

<script>
  const deadline = new Date("{{ $fechaLimitePago }}T23:59:59").getTime();

  function updateCountdown() {
    const now = new Date().getTime();
    const distance = deadline - now;

    if (distance < 0) {
      document.getElementById("countdown").textContent = "Pago vencido";
      clearInterval(interval);
      return;
    }

    const days = Math.floor(distance / (1000 * 60 * 60 * 24));
    document.getElementById("countdown").textContent = days + (days === 1 ? " día" : " días");
  }

  updateCountdown();
  const interval = setInterval(updateCountdown, 60000);
</script>


    @if(session('success'))
      <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg border border-green-200 animate-pulse">
        <div class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          {{ session('success') }}
        </div>
      </div>
    @endif

    <!-- Estadísticas -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
      <!-- Total Pacientes -->
      <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-400 hover:shadow-lg transition-all">
        <div class="flex items-center">
          <div class="p-3 bg-blue-100 rounded-full mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-500 text-sm font-medium">Pacientes</h3>
            <p class="text-2xl font-bold text-blue-600">{{ $pacientes->total() }}</p>
          </div>
        </div>
      </div>
      
      <!-- Citas Hoy -->
      <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-emerald-400 hover:shadow-lg transition-all">
        <div class="flex items-center">
          <div class="p-3 bg-emerald-100 rounded-full mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-500 text-sm font-medium">Citas Hoy</h3>
            <p class="text-2xl font-bold text-emerald-600">
              {{ isset($citas) ? $citas->filter(fn($cita) => $cita->fecha == now()->toDateString())->count() : 0 }}
            </p>
          </div>
        </div>
      </div>
      
      <!-- Notas Recientes -->
      <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-indigo-400 hover:shadow-lg transition-all">
        <div class="flex items-center">
          <div class="p-3 bg-indigo-100 rounded-full mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
          </div>
          <div>
            <h3 class="text-gray-500 text-sm font-medium">Notas Recientes</h3>
            <p class="text-2xl font-bold text-indigo-600">
              {{ isset($notas) ? $notas->where('fecha', '>=', now()->subDays(7)->toDateString())->count() : 0 }}
            </p>
          </div>
        </div>
      </div>
    </div>


<form method="GET" action="{{ route('profesional.dashboard') }}" class="mb-6 flex flex-wrap items-end gap-4">
  <div class="flex-1 min-w-[200px]">
    <label for="filter_nombre" class="block text-sm font-medium text-gray-700">Buscar paciente</label>
    <input 
      type="text" 
      name="filter_nombre" 
      id="filter_nombre"
      value="{{ request('filter_nombre') }}" 
      placeholder="Nombre del paciente..." 
      class="mt-1 border rounded-lg px-3 py-2 w-full shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
    />
  </div>

  <div>
    <label for="filter_fecha" class="block text-sm font-medium text-gray-700">Filtrar por fecha</label>
    <input 
      type="date" 
      name="filter_fecha" 
      id="filter_fecha"
      value="{{ request('filter_fecha') }}" 
      class="mt-1 border rounded-lg px-3 py-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
    />
  </div>

  <div>
    <button 
      type="submit" 
      class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500"
    >
      Filtrar
    </button>
  </div>
</form>





    <!-- Sección Pacientes -->
    <section class="mb-10">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
          Pacientes Recientes
        </h2>
        <a href="{{ route('profesional.pacientes.create') }}" 
           class="px-4 py-2 bg-blue-600 text-white rounded-lg font-medium hover:bg-blue-700 transition-all transform hover:scale-105 shadow-md hover:shadow-blue-200 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          Nuevo Paciente
        </a>
      </div>
      
      <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
        @if($pacientes->isEmpty())
          <div class="p-8 text-center text-gray-500">
            No hay pacientes registrados
          </div>
        @else
          <div class="divide-y divide-gray-200">
            @foreach($pacientes->take(5) as $paciente)
              <div class="p-4 hover:bg-blue-50 transition group">
                <div class="flex items-center justify-between">
                  <div class="flex items-center space-x-4">
                    <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 font-bold group-hover:bg-blue-200 transition">
                      {{ strtoupper(substr($paciente->nombre, 0, 1)) }}
                    </div>
                    <div>
                      <h3 class="font-medium text-gray-800 group-hover:text-blue-700 transition">{{ $paciente->nombre }}</h3>
                      <p class="text-sm text-gray-500">{{ $paciente->telefono ?? 'Sin teléfono' }}</p>
                      @if($paciente->etiquetas->isNotEmpty())
                        <div class="flex flex-wrap gap-2 mt-2">
                          @foreach($paciente->etiquetas as $etiqueta)
                            <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">
                              {{ $etiqueta->nombre }}
                            </span>
                          @endforeach
                        </div>
                      @endif
                    </div>
                  </div>
                  <div class="flex space-x-2">

                    <!-- Visualizar Paciente -->
                    <a href="{{ route('profesional.pacientes.show', $paciente) }}" 
                       class="text-blue-600 hover:text-blue-700 p-1 transform hover:scale-110 transition"
                       title="Visualizar">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </a>
                  
                    
                    <!-- Editar Paciente -->
                    <a href="{{ route('profesional.pacientes.edit', $paciente) }}" 
                       class="text-blue-600 hover:text-blue-700 p-1 transform hover:scale-110 transition"
                       title="Editar">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </a>
                    
                    <form action="{{ route('profesional.pacientes.destroy', $paciente) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar a {{ $paciente->nombre }}?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-600 hover:text-red-700 p-1 transform hover:scale-110 transition" title="Eliminar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
      <div class="mt-4">
  {{ $pacientes->links() }}
</div>

    </section>

    <!-- Sección Citas -->
    <section class="mb-10">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          Próximas Citas
        </h2>
        <a href="{{ route('profesional.citas.create') }}" 
           class="px-4 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 transition-all transform hover:scale-105 shadow-md hover:shadow-emerald-200 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          Nueva Cita
        </a>
      </div>
      
      <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
        @if(!isset($citas) || $citas->isEmpty())
          <div class="p-8 text-center text-gray-500">
            No hay citas programadas
          </div>
        @else
          <div class="divide-y divide-gray-200">
            @foreach($citas->sortBy('fecha')->take(5) as $cita)
              <div class="p-4 hover:bg-emerald-50 transition">
                <div class="flex justify-between items-center">
                  <div>
                    <div class="flex items-center space-x-2 mb-1">
                      <span class="text-sm font-medium text-gray-800">{{ $cita->paciente->nombre ?? 'Sin paciente' }}</span>
                      <span class="text-xs px-2 py-0.5 rounded-full 
                        @if($cita->estado == 'pendiente') bg-yellow-100 text-yellow-800
                        @elseif($cita->estado == 'confirmada') bg-green-100 text-green-800
                        @else bg-gray-100 text-gray-800 @endif">
                        {{ ucfirst($cita->estado) }}
                      </span>
                    </div>
                    <p class="text-sm text-gray-600">
                      {{ $cita->fecha }} 
                      @if($cita->hora)
                        · {{ \Carbon\Carbon::parse($cita->hora)->format('H:i') }}
                      @endif
                    </p>
                    @if($cita->motivo)
                      <p class="text-xs text-gray-500 mt-1">{{ $cita->motivo }}</p>
                    @endif
                  </div>
                  <div class="flex space-x-2">
                    <!-- Ver Notas de la Cita -->
                    @if($cita->paciente)
                    <a href="{{ route('profesional.notas.index', ['paciente_id' => $cita->paciente->id, 'cita_id' => $cita->id]) }}" 
                       class="text-indigo-600 hover:text-indigo-700 p-1 transform hover:scale-110 transition"
                       title="Ver notas">
   
                    </a>
                    @endif
                    
                    <!-- Visualizar Cita -->
                    <a href="{{ route('profesional.citas.show', $cita) }}" 
                       class="text-emerald-600 hover:text-emerald-700 p-1 transform hover:scale-110 transition"
                       title="Visualizar">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </a>
                    
                    <!-- Editar Cita -->
                    <a href="{{ route('profesional.citas.edit', $cita) }}" 
                       class="text-emerald-600 hover:text-emerald-700 p-1 transform hover:scale-110 transition"
                       title="Editar">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </a>
                    
                    <form action="{{ route('profesional.citas.destroy', $cita) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta cita?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-600 hover:text-red-700 p-1 transform hover:scale-110 transition" title="Eliminar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>

    <!-- Sección Notas -->
    <section>
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-semibold text-gray-800 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
          Últimas Notas
        </h2>
        <a href="{{ route('profesional.notas.create') }}" 
           class="px-4 py-2 bg-indigo-600 text-white rounded-lg font-medium hover:bg-indigo-700 transition-all transform hover:scale-105 shadow-md hover:shadow-indigo-200 flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
          </svg>
          Nueva Nota
        </a>
      </div>
      
      <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
        @if(!isset($notas) || $notas->isEmpty())
          <div class="p-8 text-center text-gray-500">
            No hay notas registradas
          </div>
        @else
          <div class="divide-y divide-gray-200">
            @foreach($notas->sortByDesc('fecha')->take(3) as $nota)
              <div class="p-4 hover:bg-indigo-50 transition">
                <div class="flex justify-between items-start">
                  <div>
                    <h3 class="text-sm font-medium text-gray-800 mb-1">
                      {{ $nota->paciente->nombre ?? 'Nota general' }} · {{ $nota->fecha }}
                    </h3>
                    <p class="text-sm text-gray-600 line-clamp-2">
                      {{ Str::limit($nota->contenido, 120) }}
                    </p>
                    @if($nota->peso_o_medida)
                      <p class="text-xs text-emerald-600 mt-1">
                        {{ $nota->peso_o_medida }}
                      </p>
                    @endif
                  </div>
                  <div class="flex space-x-2">
                    <!-- Visualizar Nota -->
                    <a href="{{ route('profesional.notas.show', $nota) }}" 
                       class="text-indigo-600 hover:text-indigo-700 p-1 transform hover:scale-110 transition"
                       title="Visualizar">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                      </svg>
                    </a>
                    
                    <!-- Editar Nota -->
                    <a href="{{ route('profesional.notas.edit', $nota) }}" 
                       class="text-indigo-600 hover:text-indigo-700 p-1 transform hover:scale-110 transition"
                       title="Editar">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                      </svg>
                    </a>
                    
                    <form action="{{ route('profesional.notas.destroy', $nota) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar esta nota?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="text-red-600 hover:text-red-700 p-1 transform hover:scale-110 transition" title="Eliminar">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                      </button>
                    </form>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>
  </div>
</div>

<style>
  .transition-all {
    transition: all 0.3s ease;
  }
  .hover-scale:hover {
    transform: scale(1.05);
  }
  .shadow-blue-200 {
    box-shadow: 0 4px 6px -1px rgba(191, 219, 254, 0.5), 0 2px 4px -1px rgba(191, 219, 254, 0.3);
  }
  .shadow-emerald-200 {
    box-shadow: 0 4px 6px -1px rgba(167, 243, 208, 0.5), 0 2px 4px -1px rgba(167, 243, 208, 0.3);
  }
  .shadow-indigo-200 {
    box-shadow: 0 4px 6px -1px rgba(199, 210, 254, 0.5), 0 2px 4px -1px rgba(199, 210, 254, 0.3);
  }
  .line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
  }
</style>
@endsection
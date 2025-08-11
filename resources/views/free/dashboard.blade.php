@extends('layouts.app')

@section('content')
<div class="bg-gradient-to-r from-emerald-50 to-green-50 border-b border-emerald-100">
  <div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row justify-between items-center">
      <div class="mb-4 md:mb-0">
        <h1 class="text-2xl md:text-3xl font-bold text-emerald-800 animate-bounce">Panel Free</h1>
        <p class="text-emerald-600">Gestión básica para tu consultorio nutricional</p>
      </div>
      <div class="flex gap-3">
        <a href="{{ route('free.pacientes.create') }}" 
           class="px-4 py-2 bg-emerald-600 text-white rounded-lg font-medium hover:bg-emerald-700 transition-all transform hover:scale-105 shadow-md hover:shadow-emerald-200">
           + Paciente
        </a>
        <a href="{{ route('free.citas.create') }}" 
           class="px-4 py-2 bg-white text-emerald-600 border border-emerald-300 rounded-lg font-medium hover:bg-emerald-50 transition-all transform hover:scale-105 shadow-sm">
           + Cita
        </a>
        <a href="{{ route('free.notas.create') }}" 
           class="px-4 py-2 bg-purple-600 text-white rounded-lg font-medium hover:bg-purple-700 transition-all transform hover:scale-105 shadow-md hover:shadow-purple-200">
           + Nota
        </a>
      </div>
    </div>
  </div>
</div>

<div class="container mx-auto px-4 py-8">
  @if(session('status'))
    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg border border-green-200 animate-pulse">
      {{ session('status') }}
    </div>
  @endif

  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-emerald-400 hover:shadow-lg transition-all">
      <div class="flex items-center">
        <div class="p-3 bg-emerald-100 rounded-full mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
          </svg>
        </div>
        <div>
          <h3 class="text-gray-500 text-sm font-medium">Pacientes</h3>
          <p class="text-2xl font-bold text-emerald-600">{{ $pacientes->count() }}</p>
        </div>
      </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-blue-400 hover:shadow-lg transition-all">
      <div class="flex items-center">
        <div class="p-3 bg-blue-100 rounded-full mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
        </div>
        <div>
          <h3 class="text-gray-500 text-sm font-medium">Citas Hoy</h3>
          <p class="text-2xl font-bold text-blue-600">
            {{ $citas->filter(fn($cita) => $cita->fecha == now()->toDateString())->count() }}
          </p>
        </div>
      </div>
    </div>
    
    <div class="bg-white p-6 rounded-lg shadow-md border-l-4 border-purple-400 hover:shadow-lg transition-all">
      <div class="flex items-center">
        <div class="p-3 bg-purple-100 rounded-full mr-4">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
          </svg>
        </div>
        <div>
          <h3 class="text-gray-500 text-sm font-medium">Notas Recientes</h3>
          <p class="text-2xl font-bold text-purple-600">
            {{ $notas->where('fecha', '>=', now()->subDays(7)->toDateString())->count() }}
          </p>
        </div>
      </div>
    </div>
  </div>

  <section class="mb-10">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-semibold text-gray-800 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
        </svg>
        Pacientes Recientes
      </h2>
    </div>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
      @if($pacientes->isEmpty())
        <div class="p-8 text-center text-gray-500">
          No hay pacientes registrados
        </div>
      @else
        <div class="divide-y divide-gray-100">
          @foreach($pacientes->take(5) as $paciente)
            <div class="p-4 hover:bg-emerald-50 transition group">
              <div class="flex items-center justify-between">
                <div class="flex items-center space-x-4">
                  <div class="w-10 h-10 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold group-hover:bg-emerald-200 transition">
                    {{ strtoupper(substr($paciente->nombre, 0, 1)) }}
                  </div>
                  <div>
                    <h3 class="font-medium text-gray-800 group-hover:text-emerald-700 transition">{{ $paciente->nombre }}</h3>
                    <p class="text-sm text-gray-500">{{ $paciente->telefono ?? 'Sin teléfono' }}</p>
                  </div>
                </div>
                <div class="flex items-center space-x-2">
                  <a href="{{ route('free.pacientes.show', $paciente) }}" class="text-emerald-600 hover:text-emerald-700 p-1 transform hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </a>
                  <a href="{{ route('free.pacientes.edit', $paciente) }}" class="text-blue-600 hover:text-blue-700 p-1 transform hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </a>
                  <form action="{{ route('free.pacientes.destroy', $paciente) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este paciente?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 p-1 transform hover:scale-110 transition">
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

  <section class="mb-10">
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-semibold text-gray-800 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        Próximas Citas
      </h2>
    </div>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
      @if($citas->isEmpty())
        <div class="p-8 text-center text-gray-500">
          No hay citas programadas
        </div>
      @else
        <div class="divide-y divide-gray-100">
          @foreach($citas->sortBy('fecha')->take(5) as $cita)
            <div class="p-4 hover:bg-blue-50 transition">
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
                <div class="flex items-center space-x-2">
                  <a href="{{ route('free.citas.edit', $cita) }}" class="text-blue-600 hover:text-blue-700 p-1 transform hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                  </a>
                  <form action="{{ route('free.citas.destroy', $cita) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta cita?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 p-1 transform hover:scale-110 transition">
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

  <section>
    <div class="flex justify-between items-center mb-4">
      <h2 class="text-lg font-semibold text-gray-800 flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
        </svg>
        Últimas Notas
      </h2>
    </div>
    
    <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-100">
      @if($notas->isEmpty())
        <div class="p-8 text-center text-gray-500">
          No hay notas registradas
        </div>
      @else
        <div class="divide-y divide-gray-100">
          @foreach($notas->sortByDesc('fecha')->take(3) as $nota)
            <div class="p-4 hover:bg-purple-50 transition">
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
                <div class="flex items-center space-x-2">
                  <a href="{{ route('free.notas.show', $nota) }}" class="text-purple-600 hover:text-purple-700 p-1 transform hover:scale-110 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                  </a>
                  <form action="{{ route('free.notas.destroy', $nota) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta nota?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-red-600 hover:text-red-800 p-1 transform hover:scale-110 transition">
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

<style>
  .animate-bounce {
    animation: bounce 2s infinite;
  }
  
  @keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-5px); }
  }
  
  .transition-all {
    transition: all 0.3s ease;
  }
  
  .hover-scale:hover {
    transform: scale(1.05);
  }
  
  .shadow-emerald-200 {
    box-shadow: 0 4px 6px -1px rgba(110, 231, 183, 0.3), 0 2px 4px -1px rgba(110, 231, 183, 0.2);
  }
  
  .shadow-purple-200 {
    box-shadow: 0 4px 6px -1px rgba(192, 132, 252, 0.3), 0 2px 4px -1px rgba(192, 132, 252, 0.2);
  }
</style>
@endsection
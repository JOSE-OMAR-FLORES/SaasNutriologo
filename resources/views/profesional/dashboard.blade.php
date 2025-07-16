@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-12 px-4 font-sans">
  <div class="max-w-6xl mx-auto space-y-12">

    {{-- Título --}}
    <div class="text-center">
      <h1 class="text-4xl font-bold text-blue-700 mb-2">Panel Profesional 🧠</h1>
      <p class="text-gray-600">Gestión avanzada de pacientes, citas y progreso.</p>
    </div>

    {{-- Alertas --}}
    @if(session('success'))
      <div class="bg-green-100 text-green-800 px-6 py-3 rounded-lg border border-green-200 shadow">
        {{ session('success') }}
      </div>
    @endif

    {{-- PACIENTES --}}
    <section>
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-700">👥 Pacientes</h2>
        <a href="{{ route('profesional.pacientes.create') }}"
           class="inline-block bg-blue-600 text-white px-5 py-2 rounded-full shadow hover:bg-blue-700 transition">
          ➕ Agregar Paciente
        </a>
      </div>

      <div class="bg-white rounded-xl shadow p-6">
        @if($pacientes->isEmpty())
          <p class="text-gray-500">Aún no tienes pacientes registrados.</p>
        @else
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @foreach($pacientes as $paciente)
              <div class="p-4 border rounded-lg bg-gray-50 hover:shadow-md transition">
                <div class="flex justify-between items-center mb-2">
                  <h3 class="text-lg font-semibold text-gray-800">{{ $paciente->nombre }}</h3>
                  <span class="text-sm text-gray-500">{{ $paciente->edad }} años</span>
                </div>
                <p class="text-sm text-gray-600">Teléfono: {{ $paciente->telefono }}</p>
                <div class="mt-3 flex gap-2 text-sm">

                  @if($paciente->etiquetas->isNotEmpty())
  <div class="flex flex-wrap gap-2 mt-2">
    @foreach($paciente->etiquetas as $etiqueta)
      <span class="bg-green-100 text-green-700 text-xs font-semibold px-2 py-1 rounded-full">
        {{ $etiqueta->nombre }}
      </span>
    @endforeach
  </div>
@endif

                  <a href="{{ route('profesional.pacientes.show', $paciente) }}" class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">Ver</a>
                  <a href="{{ route('profesional.pacientes.edit', $paciente) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                  <form action="{{ route('profesional.pacientes.destroy', $paciente) }}" method="POST" onsubmit="return confirm('¿Eliminar a {{ $paciente->nombre }}?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Eliminar</button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>

    {{-- CITAS --}}
    <section>
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-700">📆 Citas</h2>
        <a href="{{ route('profesional.citas.create') }}"
           class="inline-block bg-emerald-500 text-white px-5 py-2 rounded-full shadow hover:bg-emerald-600 transition">
          ➕ Agendar Cita
        </a>
      </div>

      <div class="bg-white rounded-xl shadow p-6">
        @if(isset($citas) && $citas->isEmpty())
          <p class="text-gray-500">No hay citas programadas.</p>
        @elseif(isset($citas))
          <div class="space-y-4">
            @foreach($citas as $cita)
              <div class="p-4 border rounded-lg bg-gray-50 hover:shadow-md transition flex justify-between items-center">
                <div>
                  <p class="text-gray-700 font-medium">{{ $cita->fecha }} - {{ $cita->hora }} | {{ ucfirst($cita->estado) }}</p>
                  <p class="text-sm text-gray-600">Motivo: {{ $cita->motivo }}</p>
                  <p class="text-sm text-gray-500">Paciente: {{ $cita->paciente->nombre ?? 'Desconocido' }}</p>
                </div>
                <div class="flex gap-2 text-sm">
                  <a href="{{ route('profesional.citas.show', $cita) }}" class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">Ver</a>
                  <a href="{{ route('profesional.citas.edit', $cita) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                  <form action="{{ route('profesional.citas.destroy', $cita) }}" method="POST" onsubmit="return confirm('¿Eliminar esta cita?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Eliminar</button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>

    {{-- NOTAS --}}
    <section>
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-semibold text-gray-700">📝 Notas</h2>
        <a href="{{ route('profesional.notas.create') }}"
           class="inline-block bg-indigo-600 text-white px-5 py-2 rounded-full shadow hover:bg-indigo-700 transition">
          ➕ Crear Nota
        </a>
      </div>

      <div class="bg-white rounded-xl shadow p-6">
        @if(isset($notas) && $notas->isEmpty())
          <p class="text-gray-500">No hay notas registradas.</p>
        @elseif(isset($notas))
          <div class="space-y-4">
            @foreach($notas as $nota)
              <div class="p-4 border rounded-lg bg-gray-50 hover:shadow-md transition flex justify-between items-center">
                <div>
                  <p class="text-gray-700 font-medium">Fecha: {{ $nota->fecha }}</p>
                  <p class="text-sm text-gray-600">{{ Str::limit($nota->contenido, 80) }}</p>
                  <p class="text-xs text-gray-400">Paciente: {{ $nota->paciente->nombre ?? 'Desconocido' }}</p>
                </div>
                <div class="flex gap-2 text-sm">
                  <a href="{{ route('profesional.notas.show', $nota) }}" class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">Ver</a>
                  <a href="{{ route('profesional.notas.edit', $nota) }}" class="bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700">Editar</a>
                  <form action="{{ route('profesional.notas.destroy', $nota) }}" method="POST" onsubmit="return confirm('¿Eliminar esta nota?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Eliminar</button>
                  </form>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </section>

    {{-- Cierre --}}
    <div class="text-center">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
          class="inline-flex items-center gap-2 px-5 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow hover:bg-red-700 transition">
          Cerrar Sesión
        </button>
      </form>
    </div>

  </div>
</div>
@endsection

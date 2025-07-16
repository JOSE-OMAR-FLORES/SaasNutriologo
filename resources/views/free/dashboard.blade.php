@extends('layouts.app')

@section('content')
  <div class="min-h-screen bg-gradient-to-b from-gray-50 to-white py-12 px-4 font-sans">
    <div class="max-w-6xl mx-auto space-y-12">

      <div class="text-center">
        <h1 class="text-4xl font-bold text-green-700 mb-3">Bienvenido al Plan Free 👋</h1>
        <p class="text-gray-600">Aquí puedes gestionar tus pacientes, citas y notas fácilmente.</p>
      </div>

      @if(session('status'))
        <div class="bg-green-100 text-green-800 px-6 py-3 rounded-lg border border-green-200 shadow">
          {{ session('status') }}
        </div>
      @endif

      {{-- PACIENTES --}}
      <section>
        <div class="flex justify-between items-center mb-4">
          <h2 class="text-2xl font-semibold text-gray-700">👤 Pacientes</h2>
          <a href="{{ route('free.pacientes.create') }}"
             class="inline-block bg-green-600 text-white px-5 py-2 rounded-full shadow hover:bg-green-700 transition">
             ➕ Agregar Paciente
          </a>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
          @if($pacientes->isEmpty())
            <p class="text-gray-500">Aún no tienes pacientes registrados.</p>
          @else
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              @foreach($pacientes as $paciente)
                @php
                  $badgeColor = match($paciente->sexo) {
                      'masculino' => 'bg-blue-100 text-blue-700',
                      'femenino' => 'bg-pink-100 text-pink-700',
                      default => 'bg-gray-200 text-gray-700',
                  };
                @endphp
                <div class="p-4 border rounded-lg bg-gray-50 hover:shadow-md transition">
                  <div class="flex justify-between items-center mb-2">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $paciente->nombre }}</h3>
                    <span class="text-xs px-3 py-1 rounded-full {{ $badgeColor }}">{{ ucfirst($paciente->sexo) }}</span>
                  </div>
                  <p class="text-sm text-gray-600">{{ $paciente->telefono }}</p>
                  <p class="text-xs text-gray-400">Nacimiento: {{ $paciente->fecha_nacimiento }}</p>
                  <div class="mt-3 flex gap-2 text-sm">
                    <a href="{{ route('free.pacientes.show', $paciente) }}" class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">Ver</a>
                    <a href="{{ route('free.pacientes.edit', $paciente) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                    <form action="{{ route('free.pacientes.destroy', $paciente) }}" method="POST" onsubmit="return confirm('¿Eliminar a {{ $paciente->nombre }}?');">
                      @csrf @method('DELETE')
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
          <h2 class="text-2xl font-semibold text-gray-700">📅 Citas</h2>
          <a href="{{ route('free.citas.create') }}"
             class="inline-block bg-emerald-500 text-white px-5 py-2 rounded-full shadow hover:bg-emerald-600 transition">
             ➕ Agregar Cita
          </a>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
          @if($citas->isEmpty())
            <p class="text-gray-500">No hay citas programadas aún.</p>
          @else
            <div class="space-y-4">
              @foreach($citas as $cita)
                <div class="border-l-4 border-emerald-500 bg-gray-50 p-4 rounded-lg hover:shadow-md transition">
                  <div class="flex justify-between items-center">
                    <div>
                      <p class="text-lg font-medium text-gray-800">
                        {{ ucfirst($cita->estado) }} — {{ $cita->fecha }} {{ $cita->hora ? 'a las ' . \Carbon\Carbon::parse($cita->hora)->format('H:i') : '' }}
                      </p>
                      {{-- Aquí corregí la propiedad motivo_consulta por motivo, según tu modelo --}}
                      <p class="text-sm text-gray-600">Motivo: {{ $cita->motivo }}</p>
                    </div>
                    <div class="flex gap-2 text-sm">
                      <a href="{{ route('free.citas.show', $cita) }}" class="bg-gray-200 px-3 py-1 rounded hover:bg-gray-300">Ver</a>
                      <a href="{{ route('free.citas.edit', $cita) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Editar</a>
                      <form action="{{ route('free.citas.destroy', $cita) }}" method="POST" onsubmit="return confirm('¿Eliminar esta cita?');">
                        @csrf @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Eliminar</button>
                      </form>
                    </div>
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
          <h2 class="text-2xl font-semibold text-gray-700">🧾 Notas</h2>
          <a href="{{ route('free.notas.create') }}"
             class="inline-block bg-indigo-600 text-white px-5 py-2 rounded-full shadow hover:bg-indigo-700 transition">
             ➕ Agregar Nota
          </a>
        </div>

        <div class="bg-white rounded-xl shadow p-6">
          @if($notas->isEmpty())
            <p class="text-gray-500">No hay notas registradas.</p>
          @else
            <div class="space-y-4">
              @foreach($notas as $nota)
                <div class="bg-white border-l-4 border-indigo-500 p-5 rounded-xl hover:shadow-lg transition">
                  <div class="flex justify-between items-center mb-2">
                    <h3 class="text-indigo-700 text-base font-medium">Nota del {{ $nota->fecha }}</h3>
                    <span class="text-xs text-gray-400">{{ $nota->paciente->nombre ?? 'Sin paciente' }}</span>
                  </div>
                  <p class="text-gray-700 text-sm whitespace-pre-line">{{ $nota->contenido }}</p>
                  @if($nota->peso_o_medida)
                    <p class="text-sm text-gray-500 mt-2"><strong>Peso/Medida:</strong> {{ $nota->peso_o_medida }}</p>
                  @endif

                  <div class="mt-4 flex justify-end gap-3 text-sm">
                    <a href="{{ route('free.notas.edit', $nota) }}" class="text-blue-600 hover:underline">Editar</a>
                    <a href="{{ route('free.notas.show', $nota) }}" class="text-gray-600 hover:underline">Ver</a>
                    <form action="{{ route('free.notas.destroy', $nota) }}" method="POST" onsubmit="return confirm('¿Eliminar esta nota?');">
                      @csrf @method('DELETE')
                      <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                    </form>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
        </div>
      </section>

      {{-- Logout --}}
      <div class="text-center pt-10">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit"
            class="inline-flex items-center gap-2 px-5 py-2 bg-red-600 text-white text-sm font-medium rounded-md shadow hover:bg-red-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
              stroke="currentColor" stroke-width="1.5">
              <path stroke-linecap="round" stroke-linejoin="round"
                d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M18 12h-9m0 0l3-3m-3 3l3 3" />
            </svg>
            <span>Salir</span>
          </button>
        </form>
      </div>

    </div>
  </div>
@endsection

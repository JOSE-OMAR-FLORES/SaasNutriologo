@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-6 text-emerald-700">Gestión de Nutriólogos</h1>

    @if(session('success'))
        <div role="alert" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div role="alert" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="mb-6 flex justify-end">
        <a href="{{ route('clinica.nutriologos.create') }}" 
           class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-6 rounded shadow transition focus:outline-none focus:ring-2 focus:ring-emerald-400 focus:ring-offset-1">
            + Agregar Nutriólogo
        </a>
    </div>

    <div class="overflow-x-auto">
      <table class="min-w-full table-auto border-collapse border border-gray-300">
          <thead class="bg-gray-100">
              <tr>
                  <th scope="col" class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold text-gray-700">Nombre</th>
                  <th scope="col" class="border border-gray-300 px-4 py-3 text-left text-sm font-semibold text-gray-700">Correo electrónico</th>
                  <th scope="col" class="border border-gray-300 px-4 py-3 text-center text-sm font-semibold text-gray-700">Acciones</th>
              </tr>
          </thead>
          <tbody>
              @forelse($nutriologos as $nutriologo)
                  <tr class="hover:bg-gray-50">
                      <td class="border border-gray-300 px-4 py-3 text-gray-800">{{ $nutriologo->name }}</td>
                      <td class="border border-gray-300 px-4 py-3 text-gray-800">{{ $nutriologo->email }}</td>
                      <td class="border border-gray-300 px-4 py-3 text-center space-x-2">
                          <a href="{{ route('clinica.nutriologos.edit', $nutriologo->id) }}" 
                             class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded shadow transition text-sm focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-1">
                              Editar
                          </a>

                          <form action="{{ route('clinica.nutriologos.destroy', $nutriologo->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Eliminar este nutriólogo?');">
                              @csrf
                              @method('DELETE')
                              <button type="submit" 
                                      class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded shadow transition text-sm focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-1">
                                  Eliminar
                              </button>
                          </form>
                      </td>
                  </tr>
              @empty
                  <tr>
                      <td colspan="3" class="text-center py-6 text-gray-500 italic">
                          No hay nutriólogos registrados.
                      </td>
                  </tr>
              @endforelse
          </tbody>
      </table>
    </div>

    <div class="mt-6">
        <a href="{{ route('clinica.dashboard') }}" 
           class="inline-block bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-5 rounded shadow transition focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-1">
            ← Volver al Dashboard
        </a>
    </div>
</div>
@endsection

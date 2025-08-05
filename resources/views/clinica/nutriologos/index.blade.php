{{-- resources/views/clinica/nutriologos/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold mb-6 text-center">Listado de Nutriólogos</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botón para crear nutriólogo --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('clinica.nutriologos.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Crear nutriólogo
        </a>
    </div>

    @if($nutriologos->isEmpty())
        <div class="text-center text-gray-500">
            No hay nutriólogos registrados aún.
        </div>
    @else
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 px-4 text-left font-semibold text-sm text-gray-700">Nombre</th>
                        <th class="py-3 px-4 text-left font-semibold text-sm text-gray-700">Correo</th>
                        <th class="py-3 px-4 text-left font-semibold text-sm text-gray-700">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($nutriologos as $nutriologo)
                        <tr class="hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $nutriologo->name }}</td>
                            <td class="py-3 px-4">{{ $nutriologo->email }}</td>
                            <td class="py-3 px-4 space-x-2">
                                <a href="{{ route('clinica.nutriologos.edit', $nutriologo->id) }}"
                                   class="text-blue-600 hover:text-blue-800 font-medium text-sm">
                                    Editar
                                </a>

                                <form action="{{ route('clinica.nutriologos.destroy', $nutriologo->id) }}" method="POST"
                                      class="inline-block"
                                      onsubmit="return confirm('¿Estás seguro de eliminar este nutriólogo?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="text-red-600 hover:text-red-800 font-medium text-sm">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection

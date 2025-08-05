@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold text-blue-700 mb-6">Detalle del Nutriólogo</h2>

    <p><strong>Nombre:</strong> {{ $nutriologo->name }}</p>
    <p><strong>Email:</strong> {{ $nutriologo->email }}</p>
    <p><strong>Teléfono:</strong> {{ $nutriologo->telefono ?? 'No registrado' }}</p>

    <div class="mt-6 flex space-x-4">
        <a href="{{ route(Auth::user()->getRoleNames()->first() . '.nutriologos.edit', $nutriologo->id) }}" 
           class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Editar</a>

        <form action="{{ route(Auth::user()->getRoleNames()->first() . '.nutriologos.destroy', $nutriologo->id) }}" method="POST" 
              onsubmit="return confirm('¿Seguro que quieres eliminar este nutriólogo?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                Eliminar
            </button>
        </form>

        <a href="{{ route(Auth::user()->getRoleNames()->first() . '.nutriologos.index') }}" 
           class="text-gray-600 hover:underline self-center">Volver a la lista</a>
    </div>
</div>
@endsection

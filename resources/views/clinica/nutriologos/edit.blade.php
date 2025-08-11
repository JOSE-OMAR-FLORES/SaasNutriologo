@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto py-10 px-6 bg-white rounded-xl shadow-lg border border-gray-200">
    <h1 class="text-4xl font-extrabold text-emerald-700 mb-8 text-center">Editar Nutriólogo</h1>

    @if ($errors->any())
        <div class="bg-red-50 border border-red-400 text-red-700 px-5 py-4 rounded mb-6">
            <ul class="list-disc list-inside space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clinica.nutriologos.update', $nutriologo->id) }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <div>
            <label for="name" class="block text-lg font-semibold text-gray-700 mb-2">Nombre completo</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $nutriologo->name) }}"
                required
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-4 focus:ring-emerald-400 focus:border-emerald-600 transition"
                placeholder="Ingresa el nombre completo"
            >
        </div>

        <div>
            <label for="email" class="block text-lg font-semibold text-gray-700 mb-2">Correo electrónico</label>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $nutriologo->email) }}"
                required
                class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-4 focus:ring-emerald-400 focus:border-emerald-600 transition"
                placeholder="ejemplo@correo.com"
            >
        </div>

        <div class="flex justify-between items-center space-x-4">
            <a href="{{ route('clinica.dashboard') }}" class="flex-1 bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 rounded-lg text-center shadow transition">
                ← Volver al Dashboard
            </a>

            <a href="{{ route('clinica.nutriologos.index') }}" class="flex-1 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-3 rounded-lg text-center shadow transition">
                Cancelar
            </a>

            <button type="submit" class="flex-1 bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 rounded-lg shadow transition">
                Guardar Cambios
            </button>
        </div>
    </form>
</div>
@endsection

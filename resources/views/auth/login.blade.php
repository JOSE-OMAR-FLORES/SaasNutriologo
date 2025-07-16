@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Iniciar sesión</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Correo --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                    class="w-full p-2 border rounded-md shadow-sm focus:ring focus:border-indigo-300">
                @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contraseña --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" required
                    class="w-full p-2 border rounded-md shadow-sm focus:ring focus:border-indigo-300">
                @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Botón --}}
            <div class="mb-4">
                <button type="submit"
                    class="w-full bg-indigo-600 text-white p-2 rounded hover:bg-indigo-700 transition">
                    Entrar
                </button>
            </div>

            <p class="text-sm text-center text-gray-600">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-indigo-600 hover:underline">Crear una</a>
            </p>
        </form>
    </div>
</div>
@endsection

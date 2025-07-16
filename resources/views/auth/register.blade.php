@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Crear cuenta</h2>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            {{-- Nombre --}}
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 @error('name') border-red-500 @enderror">

                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Correo --}}
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 @error('email') border-red-500 @enderror">

                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Contraseña --}}
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500 @error('password') border-red-500 @enderror">

                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            {{-- Confirmar contraseña --}}
            <div class="mb-4">
                <label for="password-confirm" class="block text-sm font-medium text-gray-700">Confirmar contraseña</label>
                <input id="password-confirm" type="password" name="password_confirmation" required
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            {{-- Selección de plan       <input type="hidden" name="plan" value="{{ $plan }}">   --}}
            <div class="mb-6">
    <label for="plan" class="block text-sm font-medium text-gray-700">Selecciona un plan</label>
    <select name="plan" id="plan" required
        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm p-2 focus:ring-indigo-500 focus:border-indigo-500">
        <option value="free">Free</option>
        <option value="profesional">Profesional</option>
        <option value="clinica">Clínica</option>
    </select>
</div>


            {{-- Botón --}}
            <div class="mb-4">
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-md transition duration-200">
                    Registrarse
                </button>
            </div>

            <p class="text-sm text-center text-gray-600">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="text-indigo-600 hover:underline">Iniciar sesión</a>
            </p>
        </form>
    </div>
</div>
@endsection

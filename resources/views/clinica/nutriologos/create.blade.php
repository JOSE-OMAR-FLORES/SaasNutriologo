{{-- resources/views/clinica/nutriologos/create.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-2xl font-bold mb-4">Agregar Nutriólogo</h1>

    @if($errors->any())
        <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('clinica.nutriologos.store') }}" method="POST" class="bg-white p-6 rounded shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block font-semibold mb-1">Nombre completo</label>
            <input type="text" name="name" id="name" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block font-semibold mb-1">Correo electrónico</label>
            <input type="email" name="email" id="email" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
            <label for="password" class="block font-semibold mb-1">Contraseña</label>
            <input type="password" name="password" id="password" class="w-full border px-3 py-2 rounded" required>
        </div>

        <div class="mb-4">
    <label for="password_confirmation" class="block font-semibold mb-1">Confirmar Contraseña</label>
    <input type="password" name="password_confirmation" id="password_confirmation" class="w-full border px-3 py-2 rounded" required>
</div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Crear Nutriólogo
        </button>
    </form>
</div>
@endsection

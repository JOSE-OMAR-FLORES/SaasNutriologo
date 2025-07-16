@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="bg-white p-6 rounded shadow-md text-center">
        <h2 class="text-2xl font-bold mb-4">Pagar plan: {{ ucfirst($plan) }}</h2>
        <p class="mb-4">Este es un pago simulado. Pulsa el botón para continuar.</p>

        <form method="POST" action="{{ route('pago.procesar') }}">
            @csrf
            <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">
                Pagar y crear cuenta
            </button>
        </form>
    </div>
</div>
@endsection

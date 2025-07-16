@extends('layouts.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 p-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach (['free', 'profesional', 'clinica'] as $plan)
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <h2 class="text-xl font-bold capitalize mb-4">{{ $plan }}</h2>
                    <p class="text-gray-600 mb-4">
                        @switch($plan)
                            @case('free')
                                Ideal para empezar sin costo.
                                @break
                            @case('profesional')
                                Para nutriólogos individuales con más herramientas.
                                @break
                            @case('clinica')
                                Para clínicas con múltiples nutriólogos.
                                @break
                        @endswitch
                    </p>
                    <a href="{{ route('register', ['plan' => $plan]) }}"
                       class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                        Elegir plan
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection

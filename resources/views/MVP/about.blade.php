@extends('layouts.mvp')

@section('title', 'Nosotros')

@section('content')
  <!-- Sección Intro -->
  <section class="bg-gray-50 py-12">
    <div class="max-w-5xl mx-auto px-4">
      <div class="text-center mb-10">
        <h1 class="text-4xl font-extrabold text-green-600 mb-2">Conoce quiénes somos</h1>
        <p class="text-lg text-gray-500">Impulsamos la salud con tecnología para nutriólogos.</p>
      </div>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
        <!-- Misión -->
        <div class="bg-white p-6 rounded-3xl shadow flex flex-col items-center">
          <div class="mb-4 text-green-600 text-4xl">
            <!-- Icono de Misión -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-12 h-12"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" /></svg>
          </div>
          <h4 class="font-semibold text-green-600 mb-2">Nuestra Misión</h4>
          <p class="text-gray-600">Brindar herramientas tecnológicas que optimicen la gestión de consultas y pacientes para nutriólogos profesionales.</p>
        </div>
        <!-- Visión -->
        <div class="bg-white p-6 rounded-3xl shadow flex flex-col items-center">
          <div class="mb-4 text-green-600 text-4xl">
            <!-- Icono de Visión -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-12 h-12"><circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2" fill="none"/></svg>
          </div>
          <h4 class="font-semibold text-green-600 mb-2">Nuestra Visión</h4>
          <p class="text-gray-600">Convertirnos en el SaaS de referencia para especialistas en nutrición en toda Latinoamérica.</p>
        </div>
        <!-- Valores -->
        <div class="bg-white p-6 rounded-3xl shadow flex flex-col items-center">
          <div class="mb-4 text-green-600 text-4xl">
            <!-- Icono de Valores -->
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" class="w-12 h-12"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
          </div>
          <h4 class="font-semibold text-green-600 mb-2">Nuestros Valores</h4>
          <p class="text-gray-600">Compromiso, innovación, ética profesional y enfoque humano en todo lo que hacemos.</p>
        </div>
      </div>
    </div>
  </section>
  <!-- Por qué confiar -->
  <section class="py-12 bg-white border-t">
    <div class="max-w-5xl mx-auto px-4 flex flex-col md:flex-row items-center gap-8">
      <img src="https://via.placeholder.com/600x400" class="rounded-3xl shadow w-full md:w-1/2" alt="Equipo">
      <div class="flex-1">
        <h2 class="font-extrabold text-green-600 text-3xl mb-4">¿Por qué confiar en nosotros?</h2>
        <p class="text-gray-600 text-lg mb-4">Porque entendemos las necesidades de los profesionales de la salud. Hemos construido esta plataforma desde cero, escuchando a nutriólogos reales y creando soluciones prácticas para su día a día. Nuestro equipo combina experiencia en desarrollo de software con conocimiento en el sector salud.</p>
        <a href="{{ route('contacto') }}" class="inline-block bg-green-600 text-white font-semibold px-8 py-3 rounded-xl shadow hover:bg-green-700 transition">Contáctanos</a>
      </div>
    </div>
  </section>
  <!-- Nuestro Equipo -->
  <section class="bg-gray-50 py-12 border-t">
    <div class="max-w-5xl mx-auto px-4">
      <div class="text-center mb-10">
        <h2 class="font-extrabold text-green-600 text-3xl mb-2">Nuestro Equipo</h2>
        <p class="text-gray-500 text-lg">Un equipo apasionado y comprometido con la salud y la tecnología.</p>
      </div>
      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 justify-center">
        @foreach([
          ['Jose Benjamin Castillo Segura', 'CEO & Fundador', 'https://via.placeholder.com/150'],
          ['Juan Heber Rojas Rodriguez', 'Desarrollador Senior', 'https://via.placeholder.com/150'],
          ['Cristopher Perez Perez', 'Especialista en Nutrición y Deportista', 'https://via.placeholder.com/150'],
        ] as $member)
        <div class="flex flex-col items-center">
          <img src="{{ $member[2] }}" alt="{{ $member[0] }}" class="rounded-full mb-3 shadow w-36 h-36 object-cover">
          <h5 class="text-green-600 font-semibold">{{ $member[0] }}</h5>
          <p class="text-gray-500 italic">{{ $member[1] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
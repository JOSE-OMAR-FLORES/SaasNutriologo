<x-layout meta-title="Nosotros">
  <!-- Hero Section -->
  <section class="relative bg-gradient-to-r from-emerald-600 to-green-700 text-white py-20 md:py-28">
    <div class="container mx-auto px-4 text-center">
      <h1 class="text-4xl md:text-5xl font-bold mb-6 animate-fade-in-up">Conoce quiénes somos</h1>
      <p class="text-xl md:text-2xl mb-8 max-w-2xl mx-auto animate-fade-in-up delay-150">Impulsamos la salud con tecnología para nutriólogos</p>
    </div>
  </section>

  <!-- Misión, Visión y Valores -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-5xl">
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Misión -->
        <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-all border border-gray-100 hover:border-emerald-100 animate-fade-in-up">
          <div class="bg-emerald-100 text-emerald-600 rounded-lg p-4 w-16 h-16 flex items-center justify-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6l4 2" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Nuestra Misión</h3>
          <p class="text-gray-600">Brindar herramientas tecnológicas que optimicen la gestión de consultas y pacientes para nutriólogos profesionales.</p>
        </div>

        <!-- Visión -->
        <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-all border border-gray-100 hover:border-emerald-100 animate-fade-in-up delay-100">
          <div class="bg-emerald-100 text-emerald-600 rounded-lg p-4 w-16 h-16 flex items-center justify-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-8 h-8">
              <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
              <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2" fill="none"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Nuestra Visión</h3>
          <p class="text-gray-600">Convertirnos en el SaaS de referencia para especialistas en nutrición en toda Latinoamérica.</p>
        </div>

        <!-- Valores -->
        <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-all border border-gray-100 hover:border-emerald-100 animate-fade-in-up delay-150">
          <div class="bg-emerald-100 text-emerald-600 rounded-lg p-4 w-16 h-16 flex items-center justify-center mb-6">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 h-8">
              <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-800 mb-3">Nuestros Valores</h3>
          <p class="text-gray-600">Compromiso, innovación, ética profesional y enfoque humano en todo lo que hacemos.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Por qué confiar -->
  <section class="py-16 bg-gray-50">
    <div class="container mx-auto px-4 max-w-5xl">
      <div class="flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2 animate-fade-in-up">
          <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80" 
               alt="Equipo trabajando" 
               class="rounded-2xl shadow-lg w-full h-auto object-cover">
        </div>
        <div class="md:w-1/2 animate-fade-in-up delay-150">
          <h2 class="text-3xl font-bold text-emerald-600 mb-6">¿Por qué confiar en nosotros?</h2>
          <p class="text-gray-600 text-lg mb-6">Porque entendemos las necesidades de los profesionales de la salud. Hemos construido esta plataforma desde cero, escuchando a nutriólogos reales y creando soluciones prácticas para su día a día.</p>
          <p class="text-gray-600 text-lg mb-8">Nuestro equipo combina experiencia en desarrollo de software con conocimiento en el sector salud.</p>
          <a href="{{ route('contacto') }}" class="inline-block bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-8 py-3 rounded-lg shadow-md hover:shadow-lg transition-all">
            Contáctanos
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Nuestro Equipo -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-5xl">
      <div class="text-center mb-12">
        <h2 class="text-3xl font-bold text-emerald-600 mb-4">Nuestro Equipo</h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">Un equipo apasionado y comprometido con la salud y la tecnología</p>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach([
          ['Jose Benjamin Castillo Segura', 'CEO & Fundador', 'https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80'],
          ['Juan Heber Rojas Rodriguez', 'Desarrollador Senior', 'https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80'],
          ['Cristopher Perez Perez', 'Especialista en Nutrición', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80']
        ] as $member)
        <div class="bg-white p-6 rounded-xl shadow-sm hover:shadow-md transition-all border border-gray-100 animate-fade-in-up delay-{{ $loop->index * 100 }}">
          <img src="{{ $member[2] }}" alt="{{ $member[0] }}" class="rounded-full w-32 h-32 object-cover mx-auto mb-4 shadow-md">
          <h4 class="text-xl font-semibold text-center text-emerald-600 mb-1">{{ $member[0] }}</h4>
          <p class="text-gray-500 text-center italic">{{ $member[1] }}</p>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Animaciones -->
  <style>
    @keyframes fade-in-up {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
      animation: fade-in-up 0.6s ease-out forwards;
    }
    .delay-100 {
      animation-delay: 0.1s;
    }
    .delay-150 {
      animation-delay: 0.15s;
    }
    .delay-200 {
      animation-delay: 0.2s;
    }
  </style>
</x-layout>
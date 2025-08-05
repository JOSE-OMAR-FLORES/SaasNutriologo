@extends('layouts.app')

@section('content')
    

  <!-- Hero Section -->
  <section class="bg-gradient-to-r from-emerald-500 to-green-600 text-white text-center py-20">
    <div class="container mx-auto px-4">
      <h1 class="text-4xl md:text-6xl font-extrabold mb-4 animate-fade-in-up">Haz crecer tus consulta nutricional</h1>
      <p class="text-lg md:text-xl mb-6 animate-fade-in-up delay-150">"Pierdes horas cada semana entre mensajes, agendas físicas y hojas sueltas. Simplifica todo en un solo sistema hecho para nutriólogos."</p>
      <a href="{{ route('contacto') }}" class="inline-block bg-white text-green-600 font-semibold px-8 py-3 rounded-full shadow hover:shadow-xl transition-transform transform hover:scale-105 glow-animation">Probar Gratis</a>

    </div>
  </section>

 <!-- Beneficios Clave -->
<section class="py-16 bg-gray-50">
  <div class="container mx-auto px-4 text-center">
    <h2 class="text-3xl font-bold text-green-600 mb-12 animate-fade-in">Beneficios de usar nuestro sistema</h2>
    <div class="grid gap-8 md:grid-cols-3">
      @foreach([
        ['Agenda Inteligente', 'Evita solapamientos, olvida la agenda física y automatiza recordatorios a tus pacientes.'],
        ['Seguimiento Nutricional', 'Registra el progreso clínico, historial y planes personalizados en un solo lugar.'],
        ['Gestión Moderna', 'Deja atrás el caos de WhatsApp, Excel o papel: centraliza todo en un solo sistema.'],
        ['Disminuye ausencias', 'Envía recordatorios automáticos para reducir los pacientes que no se presentan.'],
        ['Atiende a más pacientes', 'Optimiza tu tiempo con una agenda organizada y más huecos disponibles.'],
        ['App para pacientes', 'Tus pacientes pueden consultar sus planes, seguimiento y citas desde su celular.'],
        ['Historial Visual', 'Visualiza gráficamente el progreso nutricional de tus pacientes.'],
        ['Seguridad y Privacidad', 'Cumple con altos estándares de protección de datos.'],
        ['Ahorra dinero y tiempo', 'Consolida herramientas y reduce costos operativos con una solución completa.']
      ] as $feature)
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition animate-fade-in-up">
          <h3 class="text-lg font-semibold text-green-600 mb-2">{{ $feature[0] }}</h3>
          <p class="text-gray-600">{{ $feature[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>


  <!-- Planes -->
  <section class="py-16 bg-white">
    <div class="max-w-5xl mx-auto px-4">
      <h2 class="text-3xl font-extrabold text-center text-green-600 mb-10">Elige tu Plan</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Free Plan -->
        <div class="bg-gray-100 rounded-3xl shadow-lg p-8 flex flex-col items-center border border-gray-200 hover:shadow-2xl hover:scale-105 transition-transform transform">
          <h3 class="text-xl font-semibold text-gray-600 mb-4">Free</h3>
          <ul class="text-gray-500 mb-6 space-y-2 text-center">
            <li>Gestión básica de pacientes</li>
            <li>Agenda manual de citas</li>
            <li>Acceso web seguro</li>
            <li>Actualizaciones automáticas</li>
            <li>Notas privadas del nutriólogo</li>
          </ul>
          <a href="{{ route("contacto") }}" class="w-full bg-green-600 text-white font-semibold py-2 rounded-xl hover:bg-green-700 transition text-center">Seleccionar</a>
        </div>
        <!-- Profesional Plan -->
        <div class="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center border-2 border-green-600 hover:shadow-2xl hover:scale-105 transition-transform transform">
          <h3 class="text-xl font-semibold text-green-600 mb-4">Profesional</h3>
          <ul class="text-gray-600 mb-6 space-y-2 text-center">
            <li>Todo lo del plan Free</li>
            <li>Herramientas avanzadas de seguimiento</li>
            <li>Etiquetas o categorías para organizar pacientes</li>
            <li>Seguimiento del progreso del paciente (peso, medidas)</li>
          </ul>
          <a href="{{ route("contacto") }}" class="w-full bg-green-600 text-white font-semibold py-2 rounded-xl hover:bg-green-700 transition text-center">Seleccionar</a>
        </div>
        <!-- Clínica Plan -->
        <div class="bg-white rounded-3xl shadow-lg p-8 flex flex-col items-center border border-gray-200 hover:shadow-2xl hover:scale-105 transition-transform transform">
          <h3 class="text-xl font-semibold text-blue-700 mb-4">Clínica</h3>
          <ul class="text-gray-600 mb-6 space-y-2 text-center">
            <li>Todo lo del plan Profesional</li>
            <li>Multiusuario (varios nutriólogos)</li>
            <li>Soporte personalizado y capacitación</li>
            <li>Historial centralizado por clínica</li>
          </ul>
          <a href="{{ route("contacto") }}" class="w-full bg-blue-700 text-white font-semibold py-2 rounded-xl hover:bg-blue-800 transition text-center">Seleccionar</a>
        </div>
      </div>
    </div>
  </section>


  <!-- CTA Final -->
  <section class="bg-gradient-to-r from-emerald-500 to-green-400 text-white text-center py-20">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold mb-4">¿Listo para empezar?</h2>
      <p class="text-lg mb-6">Activa tu cuenta en minutos y comienza gratis.</p>
      <a href="{{ route('register') }}" class="inline-block bg-white text-green-600 font-semibold px-8 py-3 rounded-full shadow hover:shadow-xl transition-transform transform hover:scale-105 glow-animation">Probar Gratis</a>

    </div>
  </section>

  <!-- Estilos animaciones -->
  <style>
    @keyframes fade-in-up {
      0% { opacity: 0; transform: translateY(20px); }
      100% { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in-up {
      animation: fade-in-up 0.8s ease-out both;
    }
    .delay-150 {
      animation-delay: 0.15s;
    }
    .delay-300 {
      animation-delay: 0.3s;
    }
    0% {
    box-shadow: 0 0 5px #34d399, 0 0 10px #34d399, 0 0 15px #34d399;
  }
  50% {
    box-shadow: 0 0 10px #10b981, 0 0 20px #10b981, 0 0 25px #10b981;
  }
  100% {
    box-shadow: 0 0 5px #34d399, 0 0 10px #34d399, 0 0 15px #34d399;
  }


.glow-animation {
  animation: glow 2s infinite ease-in-out;
}
  </style>

@endsection
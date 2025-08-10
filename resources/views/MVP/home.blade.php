@extends('layouts.app')

@section('content')
    
<!-- Hero Section Mejorada -->
<section class="relative bg-gradient-to-r from-emerald-600 to-green-700 text-white py-24 md:py-32 overflow-hidden">
  <div class="absolute inset-0 opacity-20">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1498837167922-ddd27525d352')] bg-cover bg-center mix-blend-overlay"></div>
  </div>
  <div class="container mx-auto px-4 relative z-10">
    <div class="max-w-3xl mx-auto text-center">
      <h1 class="text-4xl md:text-6xl font-bold mb-6 leading-tight animate-fade-in-up">Transforma tu Consulta Nutricional con Tecnología</h1>
      <p class="text-xl md:text-2xl mb-8 animate-fade-in-up delay-150">Optimiza tu tiempo, mejora el seguimiento de tus pacientes y haz crecer tu práctica con herramientas diseñadas específicamente para nutriólogos.</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4 animate-fade-in-up delay-300">
        <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-emerald-700 font-bold rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-105 glow-button">
          Comenzar Gratis
        </a>
        <a href="#features" class="px-8 py-4 border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-emerald-700 transition-all">
          Ver Beneficios
        </a>
      </div>
    </div>
  </div>
</section>

<!-- Beneficios Clave Mejorados -->
<section id="features" class="py-20 bg-white">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold mb-4">POR QUÉ ELEGIRNOS</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Todo lo que necesitas en un solo lugar</h2>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">Diseñado específicamente para las necesidades de los profesionales de la nutrición</p>
    </div>
    
    <div class="grid gap-8 md:grid-cols-3">
      @foreach([
        ['Agenda Inteligente', 'Evita solapamientos y olvida la agenda física con recordatorios automáticos para tus pacientes.', 'calendar'],
        ['Seguimiento Nutricional', 'Registra progreso clínico, historial y planes personalizados en un solo lugar.', 'chart-bar'],
        ['Gestión Moderna', 'Centraliza toda la comunicación y organización, dejando atrás el caos de WhatsApp y Excel.', 'inbox-in'],
        ['Reducción de Ausencias', 'Envía recordatorios automáticos para disminuir las citas perdidas.', 'bell'],
        ['Optimización de Tiempo', 'Atiende a más pacientes con una agenda organizada y eficiente.', 'clock'],
        ['App para Pacientes', 'Tus pacientes acceden a sus planes, seguimiento y citas desde cualquier dispositivo.', 'device-mobile'],
        ['Historial Visual', 'Gráficos interactivos para visualizar el progreso nutricional.', 'presentation-chart-line'],
        ['Seguridad Garantizada', 'Cumplimos con los más altos estándares de protección de datos.', 'shield-check'],
        ['Ahorro Integral', 'Reduce costos operativos con una solución todo-en-uno.', 'currency-dollar']
      ] as $feature)
        <div class="bg-white p-8 rounded-xl shadow-md hover:shadow-lg transition-all border border-gray-100 hover:border-emerald-200 group">
          <div class="w-14 h-14 bg-emerald-100 rounded-lg flex items-center justify-center mb-6 group-hover:bg-emerald-600 group-hover:text-white text-emerald-600 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
          </div>
          <h3 class="text-xl font-semibold text-gray-900 mb-3">{{ $feature[0] }}</h3>
          <p class="text-gray-600">{{ $feature[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Planes Mejorados -->
<section class="py-20 bg-gray-50">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold mb-4">PLANES</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Elige el plan perfecto para tu consultorio</h2>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">Sin contratos largos, cancela cuando quieras</p>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <!-- Plan Básico -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-all transform hover:-translate-y-2">
        <div class="px-8 py-6 border-b border-gray-200 bg-gray-50">
          <h3 class="text-xl font-semibold text-gray-700">Básico</h3>
          <div class="mt-4 flex items-end">
            <span class="text-4xl font-bold text-gray-900">$0</span>
            <span class="ml-1 text-gray-600">/mes</span>
          </div>
        </div>
        <div class="px-8 py-6">
          <ul class="space-y-4">
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Gestión básica de pacientes</span>
            </li>
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Agenda manual de citas</span>
            </li>
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Acceso web seguro</span>
            </li>
            <li class="flex items-center opacity-50">
              <svg class="w-5 h-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
              </svg>
              <span class="text-gray-400">Recordatorios automáticos</span>
            </li>
          </ul>
          <a href="{{ route('register') }}" class="mt-8 block w-full bg-gray-100 hover:bg-gray-200 text-gray-800 font-semibold py-3 px-4 rounded-lg text-center transition-colors">
            Comenzar Gratis
          </a>
        </div>
      </div>
      
      <!-- Plan Profesional (Destacado) -->
      <div class="relative bg-white rounded-xl shadow-lg overflow-hidden border-2 border-emerald-500 transform hover:-translate-y-2 transition-all">
        <div class="absolute top-0 right-0 bg-emerald-500 text-white text-xs font-bold px-3 py-1 transform translate-x-2 -translate-y-2 rotate-12">
          POPULAR
        </div>
        <div class="px-8 py-6 border-b border-gray-200 bg-emerald-50">
          <h3 class="text-xl font-semibold text-emerald-700">Profesional</h3>
          <div class="mt-4 flex items-end">
            <span class="text-4xl font-bold text-gray-900">$299</span>
            <span class="ml-1 text-gray-600">/mes</span>
          </div>
        </div>
        <div class="px-8 py-6">
          <ul class="space-y-4">
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Todas las características del plan Básico</span>
            </li>
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Agenda inteligente con recordatorios</span>
            </li>
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Seguimiento nutricional avanzado</span>
            </li>
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>App móvil para pacientes</span>
            </li>
          </ul>
          <a href="{{ route('register') }}" class="mt-8 block w-full bg-emerald-600 hover:bg-emerald-700 text-white font-semibold py-3 px-4 rounded-lg text-center transition-colors glow-button">
            Prueba 7 Días Gratis
          </a>
        </div>
      </div>
      
      <!-- Plan Clínica -->
      <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200 hover:shadow-xl transition-all transform hover:-translate-y-2">
        <div class="px-8 py-6 border-b border-gray-200 bg-gray-50">
          <h3 class="text-xl font-semibold text-gray-700">Clínica</h3>
          <div class="mt-4 flex items-end">
            <span class="text-4xl font-bold text-gray-900">$599</span>
            <span class="ml-1 text-gray-600">/mes</span>
          </div>
        </div>
        <div class="px-8 py-6">
          <ul class="space-y-4">
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Todas las características del plan Profesional</span>
            </li>
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Multiusuario (hasta 5 nutriólogos)</span>
            </li>
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Soporte prioritario 24/7</span>
            </li>
            <li class="flex items-center">
              <svg class="w-5 h-5 text-emerald-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
              </svg>
              <span>Historial centralizado</span>
            </li>
          </ul>
          <a href="{{ route('contacto') }}" class="mt-8 block w-full bg-gray-800 hover:bg-gray-900 text-white font-semibold py-3 px-4 rounded-lg text-center transition-colors">
            Contactar Ventas
          </a>
        </div>
      </div>
    </div>
    
    <div class="mt-12 text-center text-gray-600">
      <p>¿Necesitas un plan personalizado? <a href="{{ route('contacto') }}" class="text-emerald-600 hover:underline">Contáctanos</a></p>
    </div>
  </div>
</section>

<!-- Testimonios -->
<section class="py-20 bg-white">
  <div class="container mx-auto px-4">
    <div class="text-center mb-16">
      <span class="inline-block px-4 py-2 bg-emerald-100 text-emerald-700 rounded-full text-sm font-semibold mb-4">TESTIMONIOS</span>
      <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Lo que dicen nuestros clientes</h2>
      <p class="text-lg text-gray-600 max-w-2xl mx-auto">Nutriólogos que han transformado su práctica con nuestro sistema</p>
    </div>
    
    <div class="grid gap-8 md:grid-cols-3">
      <div class="bg-gray-50 p-8 rounded-xl">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold mr-4">LR</div>
          <div>
            <h4 class="font-semibold">Dra. Laura Rodríguez</h4>
            <p class="text-sm text-gray-500">Nutrióloga Clínica</p>
          </div>
        </div>
        <p class="text-gray-700 italic">"Desde que implementé este sistema, he reducido en un 70% el tiempo que dedicaba a la administración. Ahora puedo enfocarme en lo que realmente importa: mis pacientes."</p>
        <div class="mt-4 flex text-yellow-400">
          ★★★★★
        </div>
      </div>
      
      <div class="bg-gray-50 p-8 rounded-xl">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold mr-4">CM</div>
          <div>
            <h4 class="font-semibold">Dr. Carlos Méndez</h4>
            <p class="text-sm text-gray-500">Nutriólogo Deportivo</p>
          </div>
        </div>
        <p class="text-gray-700 italic">"La app para pacientes ha sido un éxito total. Mis atletas pueden ver sus planes alimenticios y progreso en tiempo real, lo que mejora mucho su adherencia al tratamiento."</p>
        <div class="mt-4 flex text-yellow-400">
          ★★★★★
        </div>
      </div>
      
      <div class="bg-gray-50 p-8 rounded-xl">
        <div class="flex items-center mb-4">
          <div class="w-12 h-12 rounded-full bg-emerald-100 flex items-center justify-center text-emerald-600 font-bold mr-4">AG</div>
          <div>
            <h4 class="font-semibold">Dra. Ana González</h4>
            <p class="text-sm text-gray-500">Directora Clínica</p>
          </div>
        </div>
        <p class="text-gray-700 italic">"Con 5 nutriólogos en mi clínica, necesitábamos una solución centralizada. Este sistema nos ha permitido estandarizar procesos y mejorar la comunicación con los pacientes."</p>
        <div class="mt-4 flex text-yellow-400">
          ★★★★★
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CTA Final Mejorado -->
<section class="relative py-24 bg-gradient-to-br from-emerald-600 to-green-700 text-white overflow-hidden">
  <div class="absolute inset-0 opacity-10">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1505576399279-565b52d4ac71')] bg-cover bg-center mix-blend-overlay"></div>
  </div>
  <div class="container mx-auto px-4 relative z-10">
    <div class="max-w-3xl mx-auto text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6">¿Listo para transformar tu consulta nutricional?</h2>
      <p class="text-xl mb-8 max-w-2xl mx-auto">Regístrate ahora y obtén 7 días gratis del plan Profesional</p>
      <div class="flex flex-col sm:flex-row justify-center gap-4">
        <a href="{{ route('register') }}" class="px-8 py-4 bg-white text-emerald-700 font-bold rounded-full shadow-lg hover:shadow-xl transition-all hover:scale-105 glow-button">
          Comenzar Prueba Gratis
        </a>
        <a href="{{ route('contacto') }}" class="px-8 py-4 border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-emerald-700 transition-all">
          Hablar con Ventas
        </a>
      </div>
      <p class="mt-6 text-sm text-emerald-100">Sin tarjeta de crédito requerida • Cancelación en cualquier momento</p>
    </div>
  </div>
</section>

<!-- Estilos y Animaciones Mejoradas -->
<style>
  /* Animaciones */
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
  
  /* Efecto glow mejorado */
  @keyframes glow {
    0% {
      box-shadow: 0 0 5px rgba(16, 185, 129, 0.5);
    }
    50% {
      box-shadow: 0 0 20px rgba(16, 185, 129, 0.7);
    }
    100% {
      box-shadow: 0 0 5px rgba(16, 185, 129, 0.5);
    }
  }
  
  .glow-button {
    animation: glow 2s infinite ease-in-out;
  }
  
  /* Transiciones suaves */
  .transition-all {
    transition: all 0.3s ease;
  }
  
  /* Mejoras de hover */
  .hover-scale:hover {
    transform: scale(1.03);
  }
  
  /* Efecto de fondo */
  .bg-pattern {
    background-image: radial-gradient(circle, rgba(16, 185, 129, 0.1) 1px, transparent 1px);
    background-size: 20px 20px;
  }
</style>

@endsection
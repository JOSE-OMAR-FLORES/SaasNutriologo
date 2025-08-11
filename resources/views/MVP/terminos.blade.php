@extends('layouts.app')

@section('content')
<section class="bg-gradient-to-b from-gray-50 to-white py-16 md:py-24">
  <div class="container mx-auto px-4 max-w-4xl">
    <!-- Encabezado mejorado -->
    <div class="text-center mb-12">
      <h1 class="text-4xl md:text-5xl font-bold text-emerald-600 mb-4 animate-fade-in-up">Términos y Condiciones</h1>
      <div class="inline-block bg-emerald-100 text-emerald-700 px-4 py-2 rounded-full text-sm font-semibold animate-fade-in-up delay-150">
        Última actualización: junio 2025
      </div>
    </div>

    <!-- Contenido en tarjeta -->
    <div class="bg-white p-8 md:p-12 rounded-2xl shadow-lg border border-gray-100">
      <!-- Sección 1 -->
      <div class="mb-10 animate-fade-in-up">
        <div class="flex items-start mb-4">
          <div class="bg-emerald-100 text-emerald-600 rounded-lg p-3 mr-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-bold text-gray-800">1. Aceptación de los Términos</h2>
            <p class="text-gray-600 mt-2">Al acceder o utilizar nuestra plataforma, aceptas regirte por estos Términos y Condiciones, así como por nuestra Política de Privacidad. Si no estás de acuerdo con alguna parte, no debes utilizar el servicio.</p>
          </div>
        </div>
      </div>

      <!-- Sección 2 -->
      <div class="mb-10 animate-fade-in-up delay-100">
        <div class="flex items-start mb-4">
          <div class="bg-emerald-100 text-emerald-600 rounded-lg p-3 mr-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-bold text-gray-800">2. Descripción del Servicio</h2>
            <p class="text-gray-600 mt-2">Ofrecemos un software como servicio (SaaS) diseñado para facilitar la gestión de citas, expedientes y pacientes a profesionales de la nutrición. Nos reservamos el derecho de modificar, suspender o descontinuar cualquier parte del servicio en cualquier momento con previo aviso.</p>
          </div>
        </div>
      </div>

      <!-- Sección 3 -->
      <div class="mb-10 animate-fade-in-up delay-150">
        <div class="flex items-start mb-4">
          <div class="bg-emerald-100 text-emerald-600 rounded-lg p-3 mr-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-bold text-gray-800">3. Registro de Cuenta</h2>
            <p class="text-gray-600 mt-2">Para acceder a ciertas funcionalidades deberás crear una cuenta. Eres responsable de mantener la confidencialidad de tus credenciales. Notifícanos inmediatamente si detectas un uso no autorizado.</p>
          </div>
        </div>
      </div>

      <!-- Sección 4 -->
      <div class="mb-10 animate-fade-in-up delay-200">
        <div class="flex items-start mb-4">
          <div class="bg-emerald-100 text-emerald-600 rounded-lg p-3 mr-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-bold text-gray-800">4. Uso Aceptable</h2>
            <p class="text-gray-600 mt-2">El servicio solo debe utilizarse con fines legales y profesionales relacionados con la práctica de la nutrición. Está estrictamente prohibido: violar derechos de terceros, distribuir contenido ofensivo, o realizar actividades fraudulentas.</p>
          </div>
        </div>
      </div>

      <!-- Sección 5 -->
      <div class="mb-10 animate-fade-in-up delay-250">
        <div class="flex items-start mb-4">
          <div class="bg-emerald-100 text-emerald-600 rounded-lg p-3 mr-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-bold text-gray-800">5. Planes y Pagos</h2>
            <p class="text-gray-600 mt-2">Contamos con planes gratuitos y de pago. Al suscribirte a un plan de pago, autorizas el cobro periódico correspondiente. Puedes cancelar en cualquier momento desde tu cuenta o contactando al soporte.</p>
          </div>
        </div>
      </div>

      <!-- Sección 6 -->
      <div class="mb-10 animate-fade-in-up delay-300">
        <div class="flex items-start mb-4">
          <div class="bg-emerald-100 text-emerald-600 rounded-lg p-3 mr-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-bold text-gray-800">6. Cancelaciones y Reembolsos</h2>
            <p class="text-gray-600 mt-2">Puedes cancelar tu suscripción en cualquier momento. No se otorgarán reembolsos por periodos ya facturados, salvo casos excepcionales evaluados por nuestro equipo.</p>
          </div>
        </div>
      </div>

      <!-- Secciones restantes (patrón similar) -->
      @foreach([
        ['7. Propiedad Intelectual', 'Todos los derechos sobre el software, marca, diseño y contenido de la plataforma nos pertenecen o han sido licenciados para su uso. No puedes reproducir ni distribuir ningún contenido sin autorización.'],
        ['8. Protección de Datos', 'Nos tomamos muy en serio la seguridad de tus datos y la de tus pacientes. Cumplimos con normativas aplicables de protección de datos. Consulta nuestra <a href="'.route('terminos').'" class="text-emerald-600 underline">Política de Privacidad</a> para más información.'],
        ['9. Limitación de Responsabilidad', 'No nos hacemos responsables por pérdidas directas o indirectas derivadas del uso del servicio. No garantizamos que el sistema esté libre de errores o interrupciones, aunque trabajamos para asegurar alta disponibilidad.'],
        ['10. Modificaciones', 'Nos reservamos el derecho de actualizar estos términos. Notificaremos cambios importantes por correo electrónico o dentro del sistema. Es tu responsabilidad revisar regularmente los términos actualizados.'],
        ['11. Legislación Aplicable', 'Estos términos se rigen por las leyes de México. Cualquier disputa se resolverá ante los tribunales competentes del Estado de Jalisco, salvo acuerdo mutuo de otra jurisdicción.'],
        ['12. Contacto', 'Si tienes dudas sobre estos términos, contáctanos a través de <a href="mailto:soporte@tusaa.com" class="text-emerald-600 underline">soporte@9b.com</a>.']
      ] as $section)
      <div class="mb-10 animate-fade-in-up delay-{{ 300 + ($loop->index * 50) }}">
        <div class="flex items-start mb-4">
          <div class="bg-emerald-100 text-emerald-600 rounded-lg p-3 mr-4">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
          </div>
          <div>
            <h2 class="text-2xl font-bold text-gray-800">{{ $section[0] }}</h2>
            <p class="text-gray-600 mt-2">{!! $section[1] !!}</p>
          </div>
        </div>
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
  .delay-250 {
    animation-delay: 0.25s;
  }
  .delay-300 {
    animation-delay: 0.3s;
  }
  .delay-350 {
    animation-delay: 0.35s;
  }
  .delay-400 {
    animation-delay: 0.4s;
  }
  .delay-450 {
    animation-delay: 0.45s;
  }
  .delay-500 {
    animation-delay: 0.5s;
  }
  .delay-550 {
    animation-delay: 0.55s;
  }
</style>
@endsection
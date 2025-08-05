@extends('layouts.app')

@section('content')

  <div class="max-w-2xl mx-auto py-12 px-4">
    <div class="bg-white shadow-lg rounded-3xl p-8">
      <h2 class="text-3xl font-extrabold text-green-600 mb-6">Contáctanos</h2>
      <form method="POST" action="{{ route('register') }}" class="space-y-6">
        @csrf
        <div>
          <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre completo</label>
          <input type="text" id="nombre" name="nombre" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
        </div>
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Correo electrónico</label>
          <input type="email" id="email" name="email" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
        </div>
        <div>
          <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
          <input type="tel" id="telefono" name="telefono" placeholder="+52 55 1234 5678" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
        </div>
        <div>
          <label for="plan" class="block text-sm font-medium text-gray-700">Plan de interés</label>
          <select id="plan" name="plan" required class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">
            <option value="" disabled selected>Selecciona un plan</option>
            <option value="Gratis">Gratis</option>
            <option value="Profesional">Profesional</option>
            <option value="Clínica">Clínica</option>
          </select>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">¿Eres nutriólogo?</label>
          <div class="flex items-center gap-6">
            <label class="inline-flex items-center">
              <input type="radio" name="nutriologo" id="si" value="Sí" required class="text-green-600 focus:ring-green-500">
              <span class="ml-2">Sí</span>
            </label>
            <label class="inline-flex items-center">
              <input type="radio" name="nutriologo" id="no" value="No" class="text-green-600 focus:ring-green-500">
              <span class="ml-2">No</span>
            </label>
          </div>
        </div>
        <div>
          <label for="mensaje" class="block text-sm font-medium text-gray-700">Mensaje</label>
          <textarea id="mensaje" name="mensaje" rows="4" class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"></textarea>
        </div>
        <div class="flex items-start">
          <div class="flex items-center h-5">
            <input id="consentimiento" name="consentimiento" type="checkbox" required class="rounded border-gray-300 text-green-600 focus:ring-green-500">
          </div>
          <label for="consentimiento" class="ml-2 text-sm text-gray-600">
            Acepto el tratamiento de mis datos conforme a la <a href="{{ route('terminos') }}" target="_blank" class="text-green-600 underline">política de privacidad</a>.
          </label>
        </div>
        <button type="submit" class="w-full bg-green-600 text-white font-semibold py-3 rounded-xl shadow hover:bg-green-700 transition">Enviar mensaje</button>
      </form>
    </div>
  </div>
    
@endsection
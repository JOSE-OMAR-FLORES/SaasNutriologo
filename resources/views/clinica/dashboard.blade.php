@extends('layouts.app')

@section('content')
<div class="p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>
    <p>Bienvenido, administrador. Aquí puedes gestionar todo el sistema.</p>
</div>
@endsection

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="text-red-500 hover:underline">
        Cerrar sesión
    </button>
</form>
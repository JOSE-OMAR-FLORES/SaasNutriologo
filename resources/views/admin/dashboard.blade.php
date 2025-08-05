@extends('layouts.app')

@section('content')
<div x-data="userModals()" class="container mx-auto px-4 py-8">

    <!-- Filtro por rol -->
    <form method="GET" action="{{ route('admin.dashboard') }}" class="mb-8 flex items-center gap-4">
        <label for="rol" class="text-green-700 font-semibold text-lg">Filtrar por rol:</label>
        <select name="rol" id="rol" onchange="this.form.submit()"
            class="appearance-none border border-green-300 bg-white text-green-800 font-medium px-5 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 hover:border-green-500">
            <option value="">Todos</option>
            <option value="free" {{ request('rol') === 'free' ? 'selected' : '' }}>Free</option>
            <option value="clinica" {{ request('rol') === 'clinica' ? 'selected' : '' }}>Clínica</option>
            <option value="profesional" {{ request('rol') === 'profesional' ? 'selected' : '' }}>Profesional</option>
        </select>
    </form>

    <!-- Tabla de usuarios -->
    <div class="overflow-x-auto shadow-md rounded-lg bg-white mb-8">
        <table class="min-w-full table-auto">
            <thead class="bg-gradient-to-r from-green-600 to-green-400 text-white">
                <tr>
                    <th class="px-4 py-3 text-left text-sm font-medium">Nombre</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Correo</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Rol</th>
                    <th class="px-4 py-3 text-left text-sm font-medium">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-4 py-3">{{ $usuario->name }}</td>
                    <td class="px-4 py-3">{{ $usuario->email }}</td>
                    <td class="px-4 py-3">{{ $usuario->roles->pluck('name')->implode(', ') }}</td>
                    <td class="px-4 py-3 space-x-2">
                        <button 
                            @click="openEditModal({{ $usuario->id }}, '{{ $usuario->name }}', '{{ $usuario->email }}')" 
                            class="bg-yellow-400 hover:bg-yellow-500 text-white px-4 py-1 rounded-lg transition duration-200"
                        >
                            ✏️ Editar
                        </button>
                        <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button 
                                onclick="return confirm('¿Estás seguro que deseas eliminar a {{ $usuario->name }}?')"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-1 rounded-lg transition duration-200"
                            >
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Gráfica -->
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Resumen por Rol</h2>
        <canvas id="chartUsuarios" class="w-full h-64"></canvas>
    </div>

    <!-- Modal Editar Usuario -->
    <div 
        x-show="editModalOpen"
        x-transition.opacity
        x-cloak
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    >
        <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-lg">
            <h2 class="text-xl font-bold mb-4 text-gray-800">Editar Usuario</h2>
            <form :action="`/admin/usuarios/${editUser.id}`" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Nombre</label>
                    <input type="text" name="name" class="w-full border px-4 py-2 rounded-lg focus:ring focus:ring-green-300" x-model="editUser.name" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium">Correo</label>
                    <input type="email" name="email" class="w-full border px-4 py-2 rounded-lg focus:ring focus:ring-green-300" x-model="editUser.email" required>
                </div>
                <div class="flex justify-end space-x-2">
                    <button @click="editModalOpen = false" type="button" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancelar</button>
                    <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Guardar</button>
                </div>
            </form>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('userModals', () => ({
        editModalOpen: false,
        editUser: { id: null, name: '', email: '' },

        openEditModal(id, name, email) {
            this.editUser = { id, name, email };
            this.editModalOpen = true;
        }
    }))
});

// Datos para Chart.js
const data = @json(array_values($usuariosPorRol));
const labels = @json(array_keys($usuariosPorRol));

// Inicializar gráfica
window.addEventListener('DOMContentLoaded', () => {
    const ctx = document.getElementById('chartUsuarios').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Usuarios por Rol',
                data: data,
                backgroundColor: [
                    '#16a34a',
                    '#22c55e',
                    '#4ade80'
                ],
                borderColor: '#065f46',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true, ticks: { precision: 0 } }
            }
        }
    });
});
</script>
@endsection

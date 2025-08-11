@extends('layouts.app')

@section('content')

{{-- Evita parpadeo de elementos con x-cloak --}}
<style>
    [x-cloak] { display: none !important; }
</style>

<div x-data="userDashboard()" class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
        <h1 class="text-2xl font-bold text-gray-800 flex items-center">
            <svg class="w-6 h-6 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            Gestión de Usuarios
        </h1>
        
        <div class="flex flex-col sm:flex-row gap-4 w-full md:w-auto">
            <form method="GET" action="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                <label for="rol" class="text-gray-700 font-medium">Filtrar por rol:</label>
                <select name="rol" id="rol" x-on:change="$el.form.submit()"
                    class="border border-gray-300 bg-white text-gray-700 px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 hover:border-green-500 transition">
                    <option value="">Todos</option>
                    @foreach(['free', 'clinica', 'profesional'] as $role)
                    <option value="{{ $role }}" {{ request('rol') === $role ? 'selected' : '' }}>
                        {{ ucfirst($role) }}
                    </option>
                    @endforeach
                </select>
            </form>
            
            <form method="GET" action="{{ route('admin.dashboard') }}" class="flex items-center gap-2">
                <label for="search" class="text-gray-700 font-medium">Buscar:</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}"
                    class="border border-gray-300 bg-white text-gray-700 px-3 py-2 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-green-500 hover:border-green-500 transition"
                    placeholder="Nombre del usuario" x-on:keyup.debounce.300ms="$el.form.submit()">
            </form> 
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-md overflow-hidden mb-8">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-green-600 to-green-500">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Usuario</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Rol</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Registro</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-white uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($usuarios as $usuario)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10 bg-green-100 rounded-full flex items-center justify-center text-green-800 font-bold">
                                    {{ strtoupper(substr($usuario->name, 0, 1)) }}
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $usuario->name }}</div>
                                    <div class="text-sm text-gray-500">{{ $usuario->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-wrap gap-1">
                                @foreach($usuario->roles as $role)
                                <span class="px-2 py-1 text-xs rounded-full 
                                    {{ $role->name === 'admin' ? 'bg-purple-100 text-purple-800' : 
                                       ($role->name === 'profesional' ? 'bg-blue-100 text-blue-800' : 
                                       'bg-green-100 text-green-800') }}">
                                    {{ $role->name }}
                                </span>
                                @endforeach
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $usuario->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex justify-end space-x-2">
                                <button @click="openEditModal({{ $usuario->id }}, '{{ addslashes($usuario->name) }}', '{{ $usuario->email }}', {{ $usuario->roles->pluck('name') }})" 
                                    class="text-yellow-600 hover:text-yellow-900">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="confirmDelete('{{ addslashes($usuario->name) }}', this.form)"
                                        class="text-red-600 hover:text-red-900">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            No se encontraron usuarios
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($usuarios->hasPages())
        <div class="px-6 py-3 bg-gray-50 border-t border-gray-200">
            {{ $usuarios->appends(request()->query())->links() }}
        </div>
        @endif
    </div>

    @if(isset($usuariosPorRol) && is_array($usuariosPorRol))
    <div class="bg-white p-6 rounded-xl shadow-md mb-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Distribución por Rol</h2>
        <div class="relative w-full" style="height: 400px;">
            <canvas id="chartUsuarios"></canvas>
        </div>
    </div>
    @endif


    <div x-show="editModalOpen" x-transition.opacity x-cloak
        class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
        <div @click.away="editModalOpen = false" class="bg-white rounded-xl p-6 w-full max-w-md shadow-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">Editar Usuario</h2>
                <button @click="editModalOpen = false" class="text-gray-400 hover:text-gray-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            
            <form :action="`/admin/usuarios/${editUser.id}`" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                        <input type="text" name="name" x-model="editUser.name" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Correo</label>
                        <input type="email" name="email" x-model="editUser.email" required
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-green-500 focus:border-green-500">
                    </div>
                    
                    @if(isset($rolesDisponibles))
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Roles</label>
                        <div class="space-y-2">
                            @foreach($rolesDisponibles as $role)
                            <label class="inline-flex items-center">
                                <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                    x-model="editUser.roles" class="rounded text-green-600 focus:ring-green-500">
                                <span class="ml-2">{{ ucfirst($role->name) }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
                
                <div class="mt-6 flex justify-end space-x-3">
                    <button type="button" @click="editModalOpen = false"
                        class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                        Cancelar
                    </button>
                    <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Función para confirmar eliminación
function confirmDelete(userName, form) {
    if (confirm(`¿Estás seguro de eliminar al usuario ${userName}?`)) {
        form.submit();
    }
}

// Inicializar Alpine.js
document.addEventListener('alpine:init', () => {
    Alpine.data('userDashboard', () => ({
        editModalOpen: false,
        editUser: { 
            id: null, 
            name: '', 
            email: '',
            roles: []
        },

        openEditModal(id, name, email, roles = []) {
            this.editUser = { id, name, email, roles };
            this.editModalOpen = true;
        }
    }));
});

// Inicializar gráfica solo si existe el elemento
window.addEventListener('DOMContentLoaded', () => {
    const chartElement = document.getElementById('chartUsuarios');
    if (chartElement) {
        const ctx = chartElement.getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json(isset($usuariosPorRol) ? array_keys($usuariosPorRol) : []),
                datasets: [{
                    label: 'Cantidad de Usuarios',
                    data: @json(isset($usuariosPorRol) ? array_values($usuariosPorRol) : []),
                    backgroundColor: [
                        '#3B82F6', // blue
                        '#10B981', // emerald
                        '#F59E0B', // amber
                        '#8B5CF6'  // violet
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    }
});
</script>
@endsection

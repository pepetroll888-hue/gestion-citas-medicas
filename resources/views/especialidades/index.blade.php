<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Especialidades</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10">
    <div class="max-w-5xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Listado de Especialidades</h1>
                <p class="text-sm text-slate-500">Catálogo de especialidades médicas</p>
            </div>
            <div class="space-x-2">
                <a href="/" class="px-4 py-2 bg-slate-200 hover:bg-slate-300 rounded-lg text-sm font-medium transition">🏠 Inicio</a>
                <a href="{{ route('especialidades.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition shadow-sm">➕ Nueva Especialidad</a>
            </div>
        </div>

        @if(session('success'))<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm">{{ session('success') }}</div>@endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        <th class="p-4">Nombre</th>
                        <th class="p-4">Descripción</th>
                        <th class="p-4 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @foreach($especialidades as $especialidad)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-4 font-medium text-slate-900">{{ $especialidad->nombre }}</td>
                        <td class="p-4 text-slate-600">{{ $especialidad->descripcion ?? 'Sin descripción' }}</td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('especialidades.show', $especialidad->id) }}" class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('especialidades.edit', $especialidad->id) }}" class="text-amber-600 hover:underline">Editar</a>
                            <form action="{{ route('especialidades.destroy', $especialidad->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar especialidad?')" class="text-rose-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
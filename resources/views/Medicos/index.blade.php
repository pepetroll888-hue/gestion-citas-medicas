<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Médicos</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10">
    <div class="max-w-6xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Listado de Médicos</h1>
                <p class="text-sm text-slate-500">Doctores registrados y control de estados activos</p>
            </div>
            <div class="space-x-2">
                <a href="/" class="px-4 py-2 bg-slate-200 hover:bg-slate-300 rounded-lg text-sm font-medium transition">🏠 Inicio</a>
                <a href="{{ route('medicos.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition shadow-sm">➕ Nuevo Médico</a>
            </div>
        </div>

        @if(session('success'))<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="mb-4 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-xl text-sm">{{ session('error') }}</div>@endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        <th class="p-4">Nombre Completo</th>
                        <th class="p-4">Especialidad</th>
                        <th class="p-4">Teléfono</th>
                        <th class="p-4">Correo</th>
                        <th class="p-4">Estado</th>
                        <th class="p-4 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @foreach($medicos as $medico)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-4 font-medium text-slate-900">{{ $medico->nombre }} {{ $medico->apellido_paterno }} {{ $medico->apellido_materno }}</td>
                        <td class="p-4 text-slate-600"><span class="px-2.5 py-1 bg-slate-100 rounded-md text-xs font-medium">{{ $medico->especialidad->nombre ?? 'N/A' }}</span></td>
                        <td class="p-4 text-slate-600">{{ $medico->telefono }}</td>
                        <td class="p-4 text-slate-600">{{ $medico->correo }}</td>
                        <td class="p-4">
                            @if($medico->activo)
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-700 rounded-full text-xs font-semibold">ACTIVO</span>
                            @else
                                <span class="px-2.5 py-1 bg-rose-100 text-rose-700 rounded-full text-xs font-semibold">INACTIVO</span>
                            @endif
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('medicos.show', $medico->id) }}" class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('medicos.edit', $medico->id) }}" class="text-amber-600 hover:underline">Editar</a>
                            <form action="{{ route('medicos.toggle', $medico->id) }}" method="POST" class="inline">
                                @csrf @method('PATCH')
                                <button type="submit" class="text-indigo-600 hover:underline font-medium">{{ $medico->activo ? 'Desactivar' : 'Activar' }}</button>
                            </form>
                            <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar médico?')" class="text-rose-600 hover:underline">Eliminar</button>
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
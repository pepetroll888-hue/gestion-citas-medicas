<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Citas Médicas</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-900">Listado de Citas Médicas</h1>
                <p class="text-sm text-slate-500">Agenda general y control de citas programadas</p>
            </div>
            <div class="space-x-2">
                <a href="/" class="px-4 py-2 bg-slate-200 hover:bg-slate-300 rounded-lg text-sm font-medium transition">🏠 Inicio</a>
                <a href="{{ route('citas.create') }}" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition shadow-sm">➕ Agendar Cita</a>
            </div>
        </div>

        @if(session('success'))<div class="mb-4 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl text-sm">{{ session('success') }}</div>@endif
        @if(session('error'))<div class="mb-4 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-xl text-sm">{{ session('error') }}</div>@endif

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-xs font-semibold text-slate-500 uppercase tracking-wider">
                        <th class="p-4">Paciente</th>
                        <th class="p-4">Médico</th>
                        <th class="p-4">Consultorio</th>
                        <th class="p-4">Fecha y Hora</th>
                        <th class="p-4">Motivo</th>
                        <th class="p-4">Estado</th>
                        <th class="p-4 text-right">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @foreach($citas as $cita)
                    <tr class="hover:bg-slate-50 transition">
                        <td class="p-4 font-medium text-slate-900">{{ $cita->paciente->nombre ?? 'N/A' }} {{ $cita->paciente->apellido_paterno ?? '' }}</td>
                        <td class="p-4 text-slate-600">{{ $cita->medico->nombre ?? 'N/A' }} {{ $cita->medico->apellido_paterno ?? '' }}</td>
                        <td class="p-4 text-slate-600">{{ $cita->consultorio->numero ?? 'N/A' }}</td>
                        <td class="p-4 text-slate-600 whitespace-nowrap">📅 {{ $cita->fecha }}<br>⏰ {{ $cita->hora }}</td>
                        <td class="p-4 text-slate-600">{{ $cita->motivo }}</td>
                        <td class="p-4">
                            @if($cita->estado == 'PROGRAMADA')
                                <span class="px-2.5 py-1 bg-amber-100 text-amber-800 rounded-full text-xs font-semibold">PROGRAMADA</span>
                            @elseif($cita->estado == 'ATENDIDA')
                                <span class="px-2.5 py-1 bg-emerald-100 text-emerald-800 rounded-full text-xs font-semibold">ATENDIDA</span>
                            @else
                                <span class="px-2.5 py-1 bg-rose-100 text-rose-800 rounded-full text-xs font-semibold">CANCELADA</span>
                            @endif
                        </td>
                        <td class="p-4 text-right space-x-2">
                            <a href="{{ route('citas.show', $cita->id) }}" class="text-blue-600 hover:underline">Ver</a>
                            <a href="{{ route('citas.edit', $cita->id) }}" class="text-amber-600 hover:underline">Editar</a>
                            <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" class="inline">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('¿Eliminar cita?')" class="text-rose-600 hover:underline">Eliminar</button>
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
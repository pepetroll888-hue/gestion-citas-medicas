<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Detalle Médico</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10 flex items-center justify-center min-h-screen">
    <div class="max-w-xl w-full bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
        <h1 class="text-xl font-bold text-slate-900 mb-1">Expediente del Médico</h1>
        <p class="text-sm text-slate-500 mb-6">Información personal e historial de citas</p>
        
        <div class="grid grid-cols-2 gap-4 border-t border-b border-slate-100 py-4 mb-6 text-sm">
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Nombre Completo</span>
                <span class="font-medium text-slate-900">{{ $medico->nombre }} {{ $medico->apellido_paterno }} {{ $medico->apellido_materno }}</span>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Especialidad</span>
                <span class="font-medium text-slate-900">{{ $medico->especialidad->nombre ?? 'N/A' }}</span>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Teléfono</span>
                <span class="text-slate-700">{{ $medico->telefono }}</span>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Correo</span>
                <span class="text-slate-700">{{ $medico->correo }}</span>
            </div>
            <div class="col-span-2">
                <span class="text-xs font-semibold uppercase text-slate-400 block">Estado</span>
                <span class="font-bold {{ $medico->activo ? 'text-emerald-600' : 'text-rose-600' }}">{{ $medico->activo ? 'ACTIVO' : 'INACTIVO' }}</span>
            </div>
        </div>

        <h3 class="font-bold text-slate-900 mb-3 text-sm">Historial de Citas Asignadas</h3>
        <div class="bg-slate-50 rounded-xl p-4 max-h-48 overflow-y-auto border border-slate-200 mb-6 text-sm">
            <ul class="space-y-2">
                @forelse($medico->citas as $cita)
                    <li class="bg-white p-3 rounded-lg border border-slate-200 shadow-sm flex justify-between items-center">
                        <div>
                            <span class="font-medium text-slate-900">📅 {{ $cita->fecha }} a las {{ $cita->hora }}</span>
                            <p class="text-xs text-slate-500">Paciente: {{ $cita->paciente->nombre ?? 'N/A' }}</p>
                        </div>
                        <span class="px-2 py-1 bg-slate-100 rounded text-xs font-semibold">{{ $cita->estado }}</span>
                    </li>
                @empty
                    <li class="text-slate-400 text-center py-4">No tiene citas registradas.</li>
                @endforelse
            </ul>
        </div>
        
        <a href="{{ route('medicos.index') }}" class="block text-center w-full py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition">Regresar al listado</a>
    </div>
</body>
</html>
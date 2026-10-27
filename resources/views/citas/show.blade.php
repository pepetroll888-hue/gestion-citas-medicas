<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Detalle de Cita</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
        <h1 class="text-xl font-bold text-slate-900 mb-1">Detalle de Cita Médica</h1>
        <p class="text-sm text-slate-500 mb-6">Información completa de la cita</p>
        
        <div class="space-y-4 border-t border-b border-slate-100 py-4 mb-6 text-sm">
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Paciente</span>
                <span class="font-medium text-slate-900">{{ $cita->paciente->nombre ?? 'N/A' }} {{ $cita->paciente->apellido_paterno ?? '' }}</span>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Médico</span>
                <span class="font-medium text-slate-900">{{ $cita->medico->nombre ?? 'N/A' }} {{ $cita->medico->apellido_paterno ?? '' }}</span>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Consultorio</span>
                <span class="text-slate-700">{{ $cita->consultorio->numero ?? 'N/A' }} ({{ $cita->consultorio->ubicacion ?? '' }})</span>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <span class="text-xs font-semibold uppercase text-slate-400 block">Fecha</span>
                    <span class="text-slate-700">📅 {{ $cita->fecha }}</span>
                </div>
                <div>
                    <span class="text-xs font-semibold uppercase text-slate-400 block">Hora</span>
                    <span class="text-slate-700">⏰ {{ $cita->hora }}</span>
                </div>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Motivo</span>
                <span class="text-slate-700">{{ $cita->motivo }}</span>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Estado</span>
                <span class="font-bold text-blue-600">{{ $cita->estado }}</span>
            </div>
        </div>
        
        <a href="{{ route('citas.index') }}" class="block text-center w-full py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition">Regresar al listado</a>
    </div>
</body>
</html>
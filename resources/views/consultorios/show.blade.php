<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Detalle de Consultorio</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
        <h1 class="text-xl font-bold text-slate-900 mb-1">Detalles del Consultorio</h1>
        <p class="text-sm text-slate-500 mb-6">Información registrada</p>
        
        <div class="space-y-4 border-t border-b border-slate-100 py-4 mb-6">
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Número / Nombre</span>
                <span class="text-lg font-medium text-slate-900">{{ $consultorio->numero }}</span>
            </div>
            <div>
                <span class="text-xs font-semibold uppercase text-slate-400 block">Ubicación</span>
                <span class="text-base text-slate-700">{{ $consultorio->ubicacion }}</span>
            </div>
        </div>
        
        <a href="{{ route('consultorios.index') }}" class="block text-center w-full py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-sm font-medium transition">Regresar al listado</a>
    </div>
</body>
</html>
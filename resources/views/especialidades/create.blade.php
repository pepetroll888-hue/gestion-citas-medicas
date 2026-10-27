<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Nueva Especialidad</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10 flex items-center justify-center min-h-screen">
    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
        <h1 class="text-xl font-bold text-slate-900 mb-1">Registrar Especialidad</h1>
        <p class="text-sm text-slate-500 mb-6">Información del área médica</p>
        
        <form action="{{ route('especialidades.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Nombre:</label>
                <input type="text" name="nombre" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Descripción:</label>
                <textarea name="descripcion" rows="3" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('especialidades.index') }}" class="text-sm text-slate-500 hover:underline">Cancelar</a>
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium text-sm transition shadow-sm">Guardar</button>
            </div>
        </form>
    </div>
</body>
</html>
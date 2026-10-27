<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Nuevo Paciente</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10 flex items-center justify-center min-h-screen">
    <div class="max-w-lg w-full bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
        <h1 class="text-xl font-bold text-slate-900 mb-1">Registrar Paciente</h1>
        <p class="text-sm text-slate-500 mb-6">Complete los datos del paciente</p>
        
        <form action="{{ route('pacientes.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Nombre:</label>
                <input type="text" name="nombre" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Apellido Paterno:</label>
                    <input type="text" name="apellido_paterno" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Apellido Materno:</label>
                    <input type="text" name="apellido_materno" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Teléfono:</label>
                <input type="text" name="telefono" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Correo Electrónico:</label>
                <input type="email" name="correo" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('pacientes.index') }}" class="text-sm text-slate-500 hover:underline">Cancelar</a>
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium text-sm transition shadow-sm">Guardar Paciente</button>
            </div>
        </form>
    </div>
</body>
</html>
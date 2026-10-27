<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Editar Médico</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10 flex items-center justify-center min-h-screen">
    <div class="max-w-lg w-full bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
        <h1 class="text-xl font-bold text-slate-900 mb-1">Editar Médico</h1>
        <p class="text-sm text-slate-500 mb-6">Modificar datos y consultorio asignado</p>
        
        <form action="{{ route('medicos.update', $medico->id) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Nombre:</label>
                <input type="text" name="nombre" value="{{ $medico->nombre }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Apellido Paterno:</label>
                    <input type="text" name="apellido_paterno" value="{{ $medico->apellido_paterno }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Apellido Materno:</label>
                    <input type="text" name="apellido_materno" value="{{ $medico->apellido_materno }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Teléfono:</label>
                <input type="text" name="telefono" value="{{ $medico->telefono }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Correo Electrónico:</label>
                <input type="email" name="correo" value="{{ $medico->correo }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Especialidad:</label>
                <select name="especialidad_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white">
                    @foreach($especialidades as $esp)
                        <option value="{{ $esp->id }}" {{ $medico->especialidad_id == $esp->id ? 'selected' : '' }}>{{ $esp->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Consultorio Asignado:</label>
                <select name="consultorio_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white">
                    @foreach($consultorios as $consultorio)
                        <option value="{{ $consultorio->id }}" {{ $medico->consultorio_id == $consultorio->id ? 'selected' : '' }}>Consultorio {{ $consultorio->numero }} ({{ $consultorio->ubicacion }})</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('medicos.index') }}" class="text-sm text-slate-500 hover:underline">Cancelar</a>
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium text-sm transition shadow-sm">Actualizar Médico</button>
            </div>
        </form>
    </div>
</body>
</html>
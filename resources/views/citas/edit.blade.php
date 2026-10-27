<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Editar Cita</title><script src="https://cdn.tailwindcss.com"></script></head>
<body class="bg-slate-50 text-slate-800 p-6 md:p-10 flex items-center justify-center min-h-screen">
    <div class="max-w-lg w-full bg-white rounded-2xl shadow-xl border border-slate-100 p-8">
        <h1 class="text-xl font-bold text-slate-900 mb-1">Editar Cita Médica</h1>
        <p class="text-sm text-slate-500 mb-6">Modificar datos o estado de la cita</p>
        
        @if(session('error'))<div class="mb-4 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-xl text-sm"><strong>{{ session('error') }}</strong></div>@endif

        <form action="{{ route('citas.update', $cita->id) }}" method="POST" class="space-y-4">
            @csrf @method('PUT')
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Paciente:</label>
                <select name="paciente_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white">
                    @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id }}" {{ $cita->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->nombre }} {{ $paciente->apellido_paterno }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Médico:</label>
                <select name="medico_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white">
                    @foreach($medicos as $medico)
                        <option value="{{ $medico->id }}" {{ $cita->medico_id == $medico->id ? 'selected' : '' }}>{{ $medico->nombre }} {{ $medico->apellido_paterno }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Consultorio:</label>
                <select name="consultorio_id" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white">
                    @foreach($consultorios as $consultorio)
                        <option value="{{ $consultorio->id }}" {{ $cita->consultorio_id == $consultorio->id ? 'selected' : '' }}>{{ $consultorio->numero }}</option>
                    @endforeach
                </select>
            </div>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Fecha:</label>
                    <input type="date" name="fecha" value="{{ $cita->fecha }}" required min="{{ date('Y-m-d') }}" class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Hora:</label>
                    <input type="time" name="hora" value="{{ $cita->hora }}" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Motivo:</label>
                <textarea name="motivo" rows="2" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">{{ $cita->motivo }}</textarea>
            </div>
            <div>
                <label class="block text-xs font-semibold uppercase text-slate-600 mb-1">Estado de la Cita:</label>
                <select name="estado" required class="w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none bg-white">
                    <option value="PROGRAMADA" {{ $cita->estado == 'PROGRAMADA' ? 'selected' : '' }}>PROGRAMADA</option>
                    <option value="ATENDIDA" {{ $cita->estado == 'ATENDIDA' ? 'selected' : '' }}>ATENDIDA</option>
                    <option value="CANCELADA" {{ $cita->estado == 'CANCELADA' ? 'selected' : '' }}>CANCELADA</option>
                </select>
            </div>
            <div class="flex items-center justify-between pt-4">
                <a href="{{ route('citas.index') }}" class="text-sm text-slate-500 hover:underline">Cancelar</a>
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-medium text-sm transition shadow-sm">Actualizar Cita</button>
            </div>
        </form>
    </div>
</body>
</html>
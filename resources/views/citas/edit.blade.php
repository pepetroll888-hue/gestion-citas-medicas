<!DOCTYPE html>
<html>
<head>
    <title>Editar Cita</title>
</head>
<body>

<h1>Editar Cita Médica</h1>

<form action="/citas/{{ $cita->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Paciente</label><br>
    <select name="paciente_id" required>
        @foreach($pacientes as $paciente)
            <option value="{{ $paciente->id }}" {{ $cita->paciente_id == $paciente->id ? 'selected' : '' }}>
                {{ $paciente->nombre }} {{ $paciente->apellido_paterno }}
            </option>
        @endforeach
    </select><br><br>

    <label>Médico</label><br>
    <select name="medico_id" required>
        @foreach($medicos as $medico)
            <option value="{{ $medico->id }}" {{ $cita->medico_id == $medico->id ? 'selected' : '' }}>
                Dr. {{ $medico->nombre }} {{ $medico->apellido_paterno }}
            </option>
        @endforeach
    </select><br><br>

    <label>Consultorio</label><br>
    <select name="consultorio_id" required>
        @foreach($consultorios as $consultorio)
            <option value="{{ $consultorio->id }}" {{ $cita->consultorio_id == $consultorio->id ? 'selected' : '' }}>
                Consultorio {{ $consultorio->numero }}
            </option>
        @endforeach
    </select><br><br>

    <label>Fecha</label><br>
    <input type="date" name="fecha" value="{{ $cita->fecha }}" required><br><br>

    <label>Hora</label><br>
    <input type="time" name="hora" value="{{ $cita->hora }}" required><br><br>

    <label>Motivo</label><br>
    <input type="text" name="motivo" value="{{ $cita->motivo }}" required><br><br>

    <label>Estado</label><br>
    <select name="estado" required>
        <option value="PROGRAMADA" {{ $cita->estado == 'PROGRAMADA' ? 'selected' : '' }}>PROGRAMADA</option>
        <option value="ATENDIDA" {{ $cita->estado == 'ATENDIDA' ? 'selected' : '' }}>ATENDIDA</option>
        <option value="CANCELADA" {{ $cita->estado == 'CANCELADA' ? 'selected' : '' }}>CANCELADA</option>
    </select><br><br>

    <button type="submit">Actualizar Cita</button>
</form>

<br>
<a href="/citas">Regresar</a>

</body>
</html>
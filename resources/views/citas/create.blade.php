<!DOCTYPE html>
<html>
<head>
    <title>Nueva Cita</title>
</head>
<body>

<h1>Agendar Cita Médica</h1>

<form action="/citas" method="POST">
    @csrf

    <label>Paciente</label><br>
    <select name="paciente_id" required>
        <option value="" disabled selected>-- Seleccione un paciente --</option>
        @foreach($pacientes as $paciente)
            <option value="{{ $paciente->id }}">{{ $paciente->nombre }} {{ $paciente->apellido_paterno }}</option>
        @endforeach
    </select><br><br>

    <label>Médico</label><br>
    <select name="medico_id" required>
        <option value="" disabled selected>-- Seleccione un médico --</option>
        @foreach($medicos as $medico)
            <option value="{{ $medico->id }}">Dr. {{ $medico->nombre }} {{ $medico->apellido_paterno }}</option>
        @endforeach
    </select><br><br>

    <label>Consultorio</label><br>
    <select name="consultorio_id" required>
        <option value="" disabled selected>-- Seleccione un consultorio --</option>
        @foreach($consultorios as $consultorio)
            <option value="{{ $consultorio->id }}">Consultorio {{ $consultorio->numero }} ({{ $consultorio->ubicacion }})</option>
        @endforeach
    </select><br><br>

    <label>Fecha</label><br>
    <input type="date" name="fecha" required><br><br>

    <label>Hora</label><br>
    <input type="time" name="hora" required><br><br>

    <label>Motivo</label><br>
    <input type="text" name="motivo" required><br><br>

    <button type="submit">Guardar Cita</button>
</form>

<br>
<a href="/citas">Regresar</a>

</body>
</html>
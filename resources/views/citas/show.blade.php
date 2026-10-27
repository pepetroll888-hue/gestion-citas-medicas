<!DOCTYPE html>
<html>
<head>
    <title>Detalles de la Cita</title>
</head>
<body>

<h1>Detalle de la Cita Médica</h1>

<p><strong>Paciente:</strong> {{ $cita->paciente->nombre }} {{ $cita->paciente->apellido_paterno }}</p>
<p><strong>Médico:</strong> Dr. {{ $cita->medico->nombre }} {{ $cita->medico->apellido_paterno }}</p>
<p><strong>Consultorio:</strong> {{ $cita->consultorio->numero }} - Ubicación: {{ $cita->consultorio->ubicacion }}</p>
<p><strong>Fecha:</strong> {{ $cita->fecha }}</p>
<p><strong>Hora:</strong> {{ $cita->hora }}</p>
<p><strong>Motivo:</strong> {{ $cita->motivo }}</p>
<p><strong>Estado:</strong> {{ $cita->estado }}</p>

<a href="/citas/{{ $cita->id }}/edit">Editar</a>
<br><br>
<a href="/citas">Regresar al listado</a>

</body>
</html>
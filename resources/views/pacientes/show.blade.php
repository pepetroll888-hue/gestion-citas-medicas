<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Paciente</title>
</head>
<body>

<h1>Detalle del Paciente</h1>

<p><strong>Nombre:</strong> {{ $paciente->nombre }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</p>
<p><strong>Fecha de Nacimiento:</strong> {{ $paciente->fecha_nacimiento }}</p>
<p><strong>Teléfono:</strong> {{ $paciente->telefono }}</p>
<p><strong>Correo:</strong> {{ $paciente->correo }}</p>
<p><strong>Dirección:</strong> {{ $paciente->direccion }}</p>
<p><strong>Estado:</strong> {{ $paciente->activo ? 'Activo' : 'Inactivo' }}</p>

<a href="/pacientes/{{ $paciente->id }}/edit">Editar</a>
<br><br>
<a href="/pacientes">Regresar al listado</a>

</body>
</html>
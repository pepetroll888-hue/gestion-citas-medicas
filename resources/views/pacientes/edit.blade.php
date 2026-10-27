<!DOCTYPE html>
<html>
<head>
    <title>Editar Paciente</title>
</head>
<body>

<h1>Editar Paciente</h1>

<form action="/pacientes/{{ $paciente->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nombre</label><br>
    <input type="text" name="nombre" value="{{ $paciente->nombre }}" required><br><br>

    <label>Apellido Paterno</label><br>
    <input type="text" name="apellido_paterno" value="{{ $paciente->apellido_paterno }}" required><br><br>

    <label>Apellido Materno</label><br>
    <input type="text" name="apellido_materno" value="{{ $paciente->apellido_materno }}" required><br><br>

    <label>Fecha de Nacimiento</label><br>
    <input type="date" name="fecha_nacimiento" value="{{ $paciente->fecha_nacimiento }}" required><br><br>

    <label>Teléfono</label><br>
    <input type="text" name="telefono" value="{{ $paciente->telefono }}" required><br><br>

    <label>Correo</label><br>
    <input type="email" name="correo" value="{{ $paciente->correo }}" required><br><br>

    <label>Dirección</label><br>
    <input type="text" name="direccion" value="{{ $paciente->direccion }}" required><br><br>

    <button type="submit">Actualizar</button>
</form>

<br>
<a href="/pacientes">Regresar</a>

</body>
</html>
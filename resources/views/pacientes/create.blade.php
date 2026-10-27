<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Paciente</title>
</head>
<body>

<h1>Nuevo Paciente</h1>

<form action="/pacientes" method="POST">
    @csrf

    <label>Nombre</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Apellido Paterno</label><br>
    <input type="text" name="apellido_paterno" required><br><br>

    <label>Apellido Materno</label><br>
    <input type="text" name="apellido_materno" required><br><br>

    <label>Fecha de Nacimiento</label><br>
    <input type="date" name="fecha_nacimiento" required><br><br>

    <label>Teléfono</label><br>
    <input type="text" name="telefono" required><br><br>

    <label>Correo</label><br>
    <input type="email" name="correo" required><br><br>

    <label>Dirección</label><br>
    <input type="text" name="direccion" required><br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="/pacientes">Regresar</a>

</body>
</html>
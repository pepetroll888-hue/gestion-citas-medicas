<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Consultorio</title>
</head>
<body>

<h1>Nuevo Consultorio</h1>

<form action="/consultorios" method="POST">
    @csrf

    <label>Número de Consultorio</label><br>
    <input type="text" name="numero" required><br><br>

    <label>Ubicación</label><br>
    <input type="text" name="ubicacion" required><br><br>

    <button type="submit">Guardar</button>
</form>

<br>
<a href="/consultorios">Regresar</a>

</body>
</html>
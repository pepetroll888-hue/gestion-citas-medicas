<!DOCTYPE html>
<html>
<head>
    <title>Editar Consultorio</title>
</head>
<body>

<h1>Editar Consultorio</h1>

<form action="/consultorios/{{ $consultorio->id }}" method="POST">
    @csrf
    @method('PUT')

    <label>Número de Consultorio</label><br>
    <input type="text" name="numero" value="{{ $consultorio->numero }}" required><br><br>

    <label>Ubicación</label><br>
    <input type="text" name="ubicacion" value="{{ $consultorio->ubicacion }}" required><br><br>

    <button type="submit">Actualizar</button>
</form>

<br>
<a href="/consultorios">Regresar</a>

</body>
</html>
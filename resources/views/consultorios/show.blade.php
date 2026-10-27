<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Consultorio</title>
</head>
<body>

<h1>Detalle del Consultorio</h1>

<p><strong>Número:</strong> {{ $consultorio->numero }}</p>
<p><strong>Ubicación:</strong> {{ $consultorio->ubicacion }}</p>
<p><strong>Estado:</strong> {{ $consultorio->activo ? 'Activo' : 'Inactivo' }}</p>

<a href="/consultorios/{{ $consultorio->id }}/edit">Editar</a>
<br><br>
<a href="/consultorios">Regresar al listado</a>

</body>
</html>
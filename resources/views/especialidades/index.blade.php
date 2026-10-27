<!DOCTYPE html>
<html>
<head>
    <title>Especialidades</title>
</head>
<body>

    <h1>Listado de Especialidades</h1>

    <a href="{{ route('especialidades.create') }}">
        Nueva Especialidad
    </a>

    <hr>

  @foreach($especialidades as $especialidad)

    <div style="border:1px solid black; padding:10px; margin:10px;">

        <strong>Nombre:</strong>
        {{ $especialidad->nombre }}

        <br><br>

        <strong>Descripción:</strong>
        {{ $especialidad->descripcion }}

    </div>

@endforeach
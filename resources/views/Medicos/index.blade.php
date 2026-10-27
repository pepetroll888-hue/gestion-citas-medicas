<!DOCTYPE html>
<html>
<head>
    <title>Médicos</title>
</head>
<body>

<h1>Listado de Médicos</h1>

<a href="/medicos/create">
    Nuevo Médico
</a>

<hr>

@foreach($medicos as $medico)

    <div style="border:1px solid black;padding:10px;margin:10px;">

        <strong>Nombre:</strong>

        {{ $medico->nombre }}
        {{ $medico->apellido_paterno }}
        {{ $medico->apellido_materno }}

        <br><br>

        <strong>Especialidad:</strong>

        {{ $medico->especialidad->nombre }}

    </div>

@endforeach

</body>
</html>
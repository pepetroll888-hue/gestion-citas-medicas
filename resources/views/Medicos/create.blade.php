<!DOCTYPE html>
<html>
<head>
    <title>Nuevo Médico</title>
</head>
<body>

<h1>Nuevo Médico</h1>

<form action="/medicos" method="POST">

    @csrf

    <label>Nombre</label><br>
    <input type="text" name="nombre"><br><br>

    <label>Apellido Paterno</label><br>
    <input type="text" name="apellido_paterno"><br><br>

    <label>Apellido Materno</label><br>
    <input type="text" name="apellido_materno"><br><br>

    <label>Teléfono</label><br>
    <input type="text" name="telefono"><br><br>

    <label>Correo</label><br>
    <input type="email" name="correo"><br><br>

    <label>Especialidad</label><br>

    <select name="especialidad_id">

        @foreach($especialidades as $especialidad)

            <option value="{{ $especialidad->id }}">
                {{ $especialidad->nombre }}
            </option>

        @endforeach

    </select>

    <br><br>

    <button type="submit">
        Guardar
    </button>

</form>

<br>

<a href="/medicos">
    Regresar
</a>

</body>
</html>
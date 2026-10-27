<!DOCTYPE html>
<html>
<head>
    <title>Nueva Especialidad</title>
</head>
<body>

    <h1>Nueva Especialidad</h1>

    <form action="{{ route('especialidades.store') }}" method="POST">

        @csrf

        <label>Nombre:</label>
        <br>

        <input type="text" name="nombre">

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion"></textarea>

        <br><br>

        <button type="submit">
            Guardar
        </button>

    </form>

    <br>

    <a href="{{ route('especialidades.index') }}">
        Regresar
    </a>

</body>
</html>
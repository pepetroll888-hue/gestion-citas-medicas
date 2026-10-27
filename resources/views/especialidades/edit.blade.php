<!DOCTYPE html>
<html>
<head>
    <title>Editar Especialidad</title>
</head>
<body>

    <h1>Editar Especialidad</h1>

    <p>ID: {{ $especialidad->id }}</p>

    <form action="/especialidades/{{ $especialidad->id }}"
          method="POST">

        @csrf
        @method('PATCH')

        <label>Nombre:</label>
        <br>

        <input type="text"
               name="nombre"
               value="{{ $especialidad->nombre }}">

        <br><br>

        <label>Descripción:</label>
        <br>

        <textarea name="descripcion">{{ $especialidad->descripcion }}</textarea>

        <br><br>

        <button type="submit">
            Actualizar
        </button>

    </form>

    <br>

    <a href="/especialidades">
        Regresar
    </a>

</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Lista de Pacientes</title>
</head>
<body>

<h1>Listado de Pacientes</h1>

<a href="/pacientes/create">Crear Nuevo Paciente</a>
<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre Completo</th>
            <th>Teléfono</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pacientes as $paciente)
            <tr>
                <td>{{ $paciente->id }}</td>
                <td>{{ $paciente->nombre }} {{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
                <td>{{ $paciente->telefono }}</td>
                <td>{{ $paciente->correo }}</td>
                <td>
                    <a href="/pacientes/{{ $paciente->id }}">Ver</a>
                    <a href="/pacientes/{{ $paciente->id }}/edit">Editar</a>
                    <form action="/pacientes/{{ $paciente->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este paciente?')">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<br>
<a href="/">Regresar al inicio</a>

</body>
</html>
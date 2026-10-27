<!DOCTYPE html>
<html>
<head>
    <title>Lista de Citas</title>
</head>
<body>

<h1>Listado de Citas Médicas</h1>

<a href="/citas/create">Agendar Nueva Cita</a>
<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Paciente</th>
            <th>Médico</th>
            <th>Consultorio</th>
            <th>Fecha y Hora</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($citas as $cita)
            <tr>
                <td>{{ $cita->id }}</td>
                <td>{{ $cita->paciente->nombre }} {{ $cita->paciente->apellido_paterno }}</td>
                <td>Dr. {{ $cita->medico->nombre }} {{ $cita->medico->apellido_paterno }}</td>
                <td>{{ $cita->consultorio->numero }}</td>
                <td>{{ $cita->fecha }} / {{ $cita->hora }}</td>
                <td>{{ $cita->estado }}</td>
                <td>
                    <a href="/citas/{{ $cita->id }}">Ver</a>
                    <a href="/citas/{{ $cita->id }}/edit">Editar</a>
                    <form action="/citas/{{ $cita->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar esta cita?')">Eliminar</button>
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
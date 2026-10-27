<!DOCTYPE html>
<html>
<head>
    <title>Lista de Consultorios</title>
</head>
<body>

<h1>Listado de Consultorios</h1>

<a href="/consultorios/create">Crear Nuevo Consultorio</a>
<br><br>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Ubicación</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($consultorios as $consultorio)
            <tr>
                <td>{{ $consultorio->id }}</td>
                <td>{{ $consultorio->numero }}</td>
                <td>{{ $consultorio->ubicacion }}</td>
                <td>
                    <a href="/consultorios/{{ $consultorio->id }}">Ver</a>
                    <a href="/consultorios/{{ $consultorio->id }}/edit">Editar</a>
                    <form action="/consultorios/{{ $consultorio->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este consultorio?')">Eliminar</button>
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
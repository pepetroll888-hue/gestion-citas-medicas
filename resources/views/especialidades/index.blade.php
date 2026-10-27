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

    @if(session('success'))
        <p style="color:green;">
            {{ session('success') }}
        </p>
    @endif

    @foreach($especialidades as $especialidad)

        <div style="border:1px solid black; padding:10px; margin:10px;">

            <strong>Nombre:</strong>
            {{ $especialidad->nombre }}

            <br><br>

            <strong>Descripción:</strong>
            {{ $especialidad->descripcion }}

            <br><br>

            <a href="{{ route('especialidades.edit', $especialidad->id) }}">
                Editar
            </a>

            <form action="{{ route('especialidades.destroy', $especialidad->id) }}"
                  method="POST"
                  style="display:inline;">

                @csrf
                @method('DELETE')

                <button type="submit">
                    Eliminar
                </button>

            </form>

        </div>

    @endforeach

</body>
</html>
VIsta Empleado
<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->foto }}</td>
                <td>{{ $empleado->nombre }}</td>
                <td>{{ $empleado->paterno }}</td>
                <td>{{ $empleado->materno }}</td>
                <td>{{ $empleado->correo }}</td>
                <td>Editar|

                    <form action="{{ url('empleado/' . $empleado->id) }}" method="post">
                        @csrf
                        
                        <input type="submit" value="Borrar">
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

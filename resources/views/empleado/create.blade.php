Crear un nuevo empleado


<form action="{{url('/empleado')}}" method="post" enctype="multipart/form-data">
@csrf
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre">
    <br>
    <label for="paterno">Apellido Paterno:</label>
    <input type="text" name="paterno" id="paterno">
    <br>
    <label for="materno">Apellido Materno:</label>
    <input type="text" name="materno" id="materno">
    <br>
    <label for="correo">Correo Electronico:</label>
    <input type="text" name="correo" id="correo">
    <br>
    <label for="foto">Fotografia:</label>
    <input type="file" name="foto" id="foto">
    <br>
    <input type="submit" value="Guardar Datos">
</form>

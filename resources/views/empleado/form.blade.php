<h1>{{ $modo }} Empleado</h1>
<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input class="form-control" type="text" name="nombre"
        value="{{ isset($empleado->nombre) ? $empleado->nombre : '' }}" id="nombre">

</div>
<div class="form-group">
    <label for="paterno">Apellido Paterno:</label>
    <input class="form-control" type="text" name="paterno"
        value="{{ isset($empleado->paterno) ? $empleado->paterno : '' }}" id="paterno">
</div>
<div class="form-group">
    <label for="materno">Apellido Materno:</label>
    <input class="form-control" type="text" name="materno"
        value="{{ isset($empleado->materno) ? $empleado->materno : '' }}" id="materno">
</div>
<div class="form-group">
    <label for="correo">Correo Electronico:</label>
    <input class="form-control" type="text" name="correo"
        value="{{ isset($empleado->correo) ? $empleado->correo : '' }}" id="correo">
</div>
<div class="form-group">
    <label for="foto">Fotografia:</label>
    @if (isset($empleado->foto))
        <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $empleado->foto }}" width="100" alt="" srcset="">
    @endif
    <input type="file" class="form-control" name="foto" value="" id="foto">
</div>
<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} Empleado">
<a class="btn btn-primary" href="{{ url('empleado/') }}">Volver al Inicio</a>
<br>

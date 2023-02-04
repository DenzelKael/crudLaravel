<h1>{{ $modo }} Servicio</h1>

@if (count($errors) > 0)
    <div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>   
        @endforeach
    </ul>
    </div>

@endif

<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input class="form-control" style="text-transform: uppercase" type="text" name="nombre"  
        value="{{ isset($servicio->nombre) ? $servicio->nombre:old('nombre') }}" id="nombre">
</div>
<div class="form-group">
    <label for="sigla">Sigla:</label>
    <input class="form-control" style="text-transform: uppercase" type="text" name="sigla"  
        value="{{ isset($servicio->sigla) ? $servicio->sigla:old('sigla') }}" id="sigla">
</div>
<div class="form-group">
    <label for="descripcion">Descripcion:</label>
    <textarea class="form-control" type="text" name="descripcion"
        value="" id="descripcion">{{ isset($servicio->descripcion) ? $servicio->descripcion:old('descripcion') }}</textarea>
</div>
<div class="form-group">
    <label for="precio">Precio:</label>
    <input class="form-control" type="number"    step="0.01" name="precio"
        value="{{ isset($servicio->precio) ? $servicio->precio:old('precio') }}" id="precio">
</div>
<div class="form-group">
    <label for="costo">Costo:</label>
    <input class="form-control" type="number"    step="0.01" name="costo"
        value="{{ isset($servicio->costo) ? $servicio->costo:old('costo') }}" id="costo">
</div>
<div class="form-group">
    <label for="diferencia">Diferencia:</label>
    <input class="form-control" type="number"    step="0.01" name="diferencia"
        value="{{ isset($servicio->diferencia) ? $servicio->diferencia:old('diferencia') }}" id="diferencia">
</div>

<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} servicio">
<a class="btn btn-primary" href="{{ url('servicio/') }}">Volver al Inicio</a>
<br>

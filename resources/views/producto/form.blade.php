<h1>{{ $modo }} Producto</h1>

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
        value="{{ isset($producto->nombre) ? $producto->nombre:old('nombre') }}" id="nombre">
</div>
<div class="form-group">
    <label for="precio">Precio:</label>
    <input class="form-control" type="number"    step="0.01" name="precio"
        value="{{ isset($producto->precio) ? $producto->precio:old('precio') }}" id="precio">
</div>
<div class="form-group">
    <label for="costo">Costo:</label>
    <input class="form-control" type="number"    step="0.01" name="costo"
        value="{{ isset($producto->costo) ? $producto->costo:old('costo') }}" id="costo">
</div>
<div class="form-group">
    <label for="existencia">existencia:</label>
    <input class="form-control" type="number"    step="0.01" name="existencia"
        value="{{ isset($producto->existencia) ? $producto->existencia:old('existencia') }}" id="existencia">
</div>
<div class="form-group">
    <label for="descuento">descuento:</label>
    <input class="form-control" type="number"    step="0.01" name="descuento"
        value="{{ isset($producto->descuento) ? $producto->descuento:old('descuento') }}" id="descuento">
</div>
<div class="form-group">
    <label for="id_categoria">id_categoria:</label>
    <input class="form-control" type="number"    step="0.01" name="id_categoria"
        value="{{ isset($producto->id_categoria) ? $producto->id_categoria:old('id_categoria') }}" id="id_categoria">
</div>


<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} producto">
<a class="btn btn-primary" href="{{ url('producto/') }}">Volver al Inicio</a>
<br>

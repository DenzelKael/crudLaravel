<h1>{{ $modo }} Extracto Bancario</h1>

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
    <input class="form-control"  type="text" name="nombre"
        value="{{ isset($archivo->nombre) ? $archivo->nombre : old('nombre') }}" id="nombre" placeholder="Haz click!">

</div>

<div class="form-group d-flex row justify-content-between">
    <div class="form-group flex-fill col-5">
        <label for="fecha">Fecha:</label>
        <input class="form-control" type="date" name="fecha"
            value="{{ isset($archivo->fecha) ? $archivo->fecha : old('fecha') }}" id="fecha">
    </div>
    <div class="form-group flex-fill col-5">
        <label for="descripcion">Seleccione Plataforma Bancaria:</label><br>
        <select name="plataforma" id="descripcion">
            <option value="UNIMOVIL PLUS" name="unimovil plus">UNIMOVIL PLUS</option>
            <option value="PRODEM" name="prodem">PRODEM</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="archivo">Archivo de Excel:</label>

    <input type="file" class="form-control" name="archivo" value="" id="archivo">
</div>
<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} archivo">
<a class="btn btn-danger" href="{{ url('archivo/') }}">Cancelar</a>
<br>
<script src="{{ asset('js/archivo.js') }}"></script>

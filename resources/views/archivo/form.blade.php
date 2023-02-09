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

<div class="form-group d-flex row justify-content-start col-12">
    <div class="form-group flex-fill col-6">
        <label for="fecha">Fecha:</label>
        <input class="form-control" type="date" name="fecha"
            value="{{ isset($archivo->fecha) ? $archivo->fecha : old('fecha') }}" id="fecha">
    </div>
    <div class="form-group flex-fill col-12">
        <label for="descripcion">Seleccione Plataforma Bancaria:</label><br>
        <select class="form-control form-select" name="id_plataforma" id="descripcion">
        @foreach ($plataformas as $plataforma)
        <option class="danger"  value="{{$plataforma->id}}" name="{{$plataforma->nombre}}">{{$plataforma->nombre}}</option>
        @endforeach
            
        </select>
    </div>
</div>
<div class="form-group">
    <label for="archivo">Archivo de Excel:</label>

    <input type="file" class="form-control" name="archivo" value="" id="archivo">
</div>

<input class="btn btn-success" type="submit" value="{{ $modo }} archivo">
<a class="btn btn-danger" href="{{ url('archivo/') }}">Cancelar</a>

<script src="{{ asset('js/archivo.js') }}"></script>

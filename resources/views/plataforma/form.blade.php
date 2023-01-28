<h1>{{ $modo }} Plataformas Bancarias</h1>

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
        value="{{ isset($plataforma->nombre) ? $plataforma->nombre:old('nombre') }}" id="nombre">

</div>

<div class="form-group">
    <label for="descripcion">Descripcion:</label>
    <textarea class="form-control" type="text" name="descripcion"
        value="{{ isset($plataforma->descripcion) ? $plataforma->descripcion:old('descripcion') }}" id="descripcion"></textarea>
</div>
<br>
<input class="btn btn-success" type="submit" value="{{ $modo }} plataforma">
<a class="btn btn-primary" href="{{ url('plataforma/') }}">Volver al Inicio</a>
<br>

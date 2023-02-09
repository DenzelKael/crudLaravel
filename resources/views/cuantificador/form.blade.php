@extends('layout.adminlte') 
@section('content')
    <div class="container">
    {{--     <div class="alert alert-success alert-dismissible fade-show" role="alert">
            @if (Session::has('mensaje'))
                {{ Session::get('mensaje') }}
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="alert" disabled aria-label="Close"></button>
            <span aria-hidden="true">&times;</span>
        </div> --}}
    {{--     @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}
            
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif --}}
   
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Nro Extracto</th>
                    <th>Nro Archivo</th>
                    <th>Fecha</th>
                    <th>AG</th>
                    <th>Descripcion</th>
                    <th>Nro Documento</th>
                    <th>Monto</th>
                    <th>Saldo</th>
                   
                  {{--   <th>Acciones</th> --}}
                </tr>
            </thead>
            <tbody>
                @foreach ($extractos as $extracto)
                    <tr class="@if (trim($extracto->monto)=="-17.00")
                        table-primary @elseif (trim($extracto->monto)=="-10.00")
                        table-warning @elseif (trim($extracto->monto)=="-200.00" || trim($extracto->monto)=="-50.00")
                        table-danger @elseif (trim($extracto->monto)=="-225.00" || trim($extracto->monto)=="-80.00")
                        table-success @elseif (trim($extracto->monto)=="-160.00")
                        table-info
                    @endif">
                        
                        <td>{{ $extracto->id }}</td>
                        <td>{{ $extracto->id_archivo }}</td>
                        <td>{{ $extracto->fecha }}</td>
                        <td>{{ $extracto->AG }}</td>
                        <td>{{ $extracto->descripcion }}</td>
                        <td>{{ $extracto->nro_documento }}</td>
                        <td>{{ $extracto->monto }}</td>
                        <td>{{ $extracto->saldo }}</td>
                     {{--    <td>
                            <a href="{{ url('extracto/' . $extracto->id . '/edit') }}" class="btn btn-warning">Editar</a>


                            <form action="{{ url('extracto/' . $extracto->id) }}" method="post" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit"
                                    onclick="return confirm('¿Quieres realmente borrar?')" value="Borrar">
                            </form>

                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $extractos->links()!!}
        <a class="btn btn-danger" href="{{ url('archivo') }}">Volver Atras</a>
        <a class="btn btn-warning" href="{{ url('cuantificador') }}">Cuantificar</a>
    </div>
@endsection
<script src="{{asset('js/extractos.js')}}"></script>

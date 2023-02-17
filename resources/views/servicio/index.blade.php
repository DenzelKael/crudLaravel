@extends('layout.adminlte')
@section('content-header')
    <h2>Listado de Servicios</h2>
@stop
@section('content')


    <div class="">

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif




        <a class="btn btn-success" href="{{ url('servicio/create') }}">Registrar Nuevo Servicio</a>
        <br><br>
        <table id="servicios" class="table table-light ">
            <thead class="thead-light align-middle">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Sigla</th>
                    <th>Precio</th>
                    <th>Costo</th>
                    <th>Diferencia</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($servicios as $servicio)
                    <tr>
                        <td class="table-primary">{{ $servicio->id }}</td>
                        <td class="table-danger" style="text-transform: uppercase">{{ $servicio->nombre }}</td>
                        <td class="table-warning" style="text-transform: uppercase">{{ $servicio->sigla }}</td>
                        <td class="table-success">{{ $servicio->precio }}</td>
                        <td>{{ $servicio->costo }}</td>
                        <td class="table-info">{{ $servicio->diferencia }}</td>
                        <td>{{ $servicio->descripcion }}</td>
                        <td>
                            <a title="Editar" href="{{ url('banco/' . $servicio->id . '/edit') }}" class="btn btn-warning">
                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </a>
                            <form action="{{ url('banco/' . $servicio->id) }}" method="post" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button title="Eliminar" class="btn btn-danger" type="submit"
                                    onclick="return confirm('¿Quieres realmente borrar?')" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form> 

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
         {!! $servicios->links() !!} 
    </div>
@endsection

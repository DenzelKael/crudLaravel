@extends('layouts.app')
@section('content')
    <div class="container">
    {{--     <div class="alert alert-success alert-dismissible fade-show" role="alert">
            @if (Session::has('mensaje'))
                {{ Session::get('mensaje') }}
            @endif
            <button type="button" class="btn-close" data-bs-dismiss="alert" disabled aria-label="Close"></button>
            <span aria-hidden="true">&times;</span>
        </div> --}}
        @if (Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}
            
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
          @endif




        <a class="btn btn-success" href="{{ url('empleado/create') }}">Registrar Nuevo Empleado</a>
        <br><br>
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
                        <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $empleado->foto }}"
                                width="100" alt="" srcset="">
                        </td>
                        <td>{{ $empleado->foto }}</td>
                        <td>{{ $empleado->nombre }}</td>
                        <td>{{ $empleado->paterno }}</td>
                        <td>{{ $empleado->materno }}</td>
                        <td>{{ $empleado->correo }}</td>
                        <td>
                            <a href="{{ url('empleado/' . $empleado->id . '/edit') }}" class="btn btn-warning">Editar</a>


                            <form action="{{ url('empleado/' . $empleado->id) }}" method="post" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit"
                                    onclick="return confirm('¿Quieres realmente borrar?')" value="Borrar">
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $empleados->links()!!}
    </div>
@endsection

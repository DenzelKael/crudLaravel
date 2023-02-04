@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="container p-3 bg-info bg-opacity-10 border border-info rounded">
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




            {{-- <a class="btn btn-success" href="{{ url('archivo/create') }}">Registrar Nuevo archivo</a> --}}
            <br><br>
            <table class="table table-light ">
                <thead class="thead-light align-middle">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Plataforma</th>
                        <th>Archivo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($archivos as $archivo)
                        <tr>
                          <td>{{$archivo->id}}</td>
                            <td style="text-transform: uppercase">{{ $archivo->nombre }}</td>
                            <td >{{ $archivo->fecha }}</td>
                            <td>{{ $archivo->id_plataforma }}</td>
                            <td>{{ $archivo->archivo }}</td>
                            <td>
                                <a href="{{ url('extracto/'.$archivo->id) }}" class="btn btn-info">Ver Extracto</a>
                                <a href="{{ url('archivo/' . $archivo->id . '/edit') }}" class="btn btn-warning">Editar</a>


                                <form action="{{ url('archivo/' . $archivo->id) }}" method="post" class="d-inline">
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
            {!! $archivos->links() !!}
        </div>
    </div>
@endsection

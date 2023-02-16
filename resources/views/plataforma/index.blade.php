@extends('layout.adminlte')
@section('content')


    <div class="">
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a class="btn btn-success" href="{{ url('plataforma/create') }}">Registrar Nueva plataforma</a>
        <br><br>
        <table id="plataformas" class="table table-light ">
            <thead class="thead-light align-middle">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Saldo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($plataformas as $plataforma)
                    <tr>
                       <td>{{$plataforma->id}}</td>
                        <td class="table-primary" style="text-transform: uppercase">{{ $plataforma->nombre }}</td>
                        <td >{{ $plataforma->descripcion }}</td>
                        <td >{{ $plataforma->saldo }}</td>
                        <td>
                            <a href="{{ url('plataforma/' . $plataforma->id . '/edit') }}" class="btn btn-warning">Editar</a>


                            <form action="{{ url('plataforma/' . $plataforma->id) }}" method="post" class="d-inline">
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
        {!! $plataformas->links() !!}
    </div>
@endsection

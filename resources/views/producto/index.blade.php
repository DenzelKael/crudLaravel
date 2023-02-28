@extends('layout.adminlte')
@section('content')


    <div class="">
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




        <a class="btn btn-success" href="{{ url('producto/create') }}">Registrar Nuevo Producto</a>
        <br><br>
        <table class="table table-light ">
            <thead class="thead-light align-middle">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Costo</th>
                    <th>Diferencia</th>
                    <th>Existencia</th>
                  {{--   <th>Acciones</th> --}}
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($productos as $producto)
                    <tr>
                    <td>{{$producto->id}}</td>
                      {{--   <td>
                            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $producto->foto }}"
                                width="50" alt="" srcset="">
                        </td> --}}
                        <td style="text-transform: uppercase">{{ $producto->nombre }}</td>
                        <td class="table-primary">{{ $producto->precio }}</td>
                        <td>{{ $producto->costo }}</td>
                        <td>{{ $producto->diferencia }}</td>
                        <td
                            class="@if ($producto->existencia < 10) table-danger
                        @elseif ($producto->existencia >= 100)
                            table-success
                        @else
                            table-warning @endif">
                            {{ $producto->existencia }}</td>
            
                        {{-- <td>
                           
                            <a title="Editar" href="{{ url('banco/' . $producto->id . '/edit') }}" class="btn btn-warning">
                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </a>
                            <form action="{{ url('banco/' . $producto->id) }}" method="post" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button title="Eliminar" class="btn btn-danger" type="submit"
                                    onclick="return confirm('¿Quieres realmente borrar?')" >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form> 
                        

                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $productos->links() !!}
    </div>
@endsection

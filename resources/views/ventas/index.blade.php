@extends('layout.adminlte')
@section('content-header')
    <h2>Listado de Ventas</h2>
@stop
@section('css')
    <link rel="stylesheet" href="{{ asset('js/jquery-ui-1.13.2.custom/jquery-ui.css') }}">
@endsection

@section('content')
    <div class="">

        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif



        <!-- Button trigger modal -->
        <a type="button" class="mt-3 mb-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#ventasModal">
            Registrar Nueva Venta
        </a>
        @include('modal.ventas_modal')

        <table id="Ventas" class="table table-light ">
            <thead class="thead-light align-middle">
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Fecha Venta</th>
                    <th>Tipo</th>
                    <th>Total</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($ventas as $venta)
                    <tr>
                        <td class="table-primary">{{ $venta->id }}</td>
                        <td class="table-danger" style="text-transform: uppercase">{{ $venta->users->name }}</td>
                        <td class="table-warning" style="text-transform: uppercase">{{ $venta->fecha_ingreso }}</td>
                        <td class="table-success">{{ $venta->tipo_ingreso }}</td>
                        <td>{{ $venta->total }}</td>
                        <td class="table-info">{{ $venta->estado }}</td>
                        <td>
                            <a title="Editar" href="{{ url('ventas/' . $venta->id . '/edit') }}" class="btn btn-warning">
                                <i class="fas fa-edit" aria-hidden="true"></i>
                            </a>
                            <form action="{{ url('ventas/' . $venta->id) }}" method="post" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button title="Eliminar" class="btn btn-danger" type="submit"
                                    onclick="return confirm('¿Quieres realmente borrar?')">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{--   {!! $ventas->links() !!}  --}}
    </div>
@endsection
@section('js')
    <script src="{{ asset('js/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui-1.13.2.custom/jquery-ui.js') }}"></script>
    <script src="{{ asset('js/ventas.js') }}"></script>

@endsection

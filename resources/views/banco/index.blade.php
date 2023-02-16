@extends('layout.adminlte')

@section('content')
    <div class="card col-12">
        <div class="card-body">
            <h1>Listado de Extractos Bancarios</h1>
            @if (Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('mensaje') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <a class="btn btn-danger" href="{{ url('banco') }}">Volver Atras</a>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bancoModal">
                Añadir Cierre de banco
            </button>

            @include('modal.bancomodal')

            <div class="pt-4">
                <table id="bancos" class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Usuario</th>
                            <th>Plataforma</th>
                            <th>Fecha</th>
                            <th>Monto de Apertura</th>
                            <th>Monto de Cierre</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bancos as $banco)
                            <tr>
                                <td>{{ $banco->id }}</td>
                                <td>{{ $banco->user?->name }}</td>
                                <td>{{ $banco->plataforma?->nombre }}</td>
                                <td>{{ $banco->fecha_cierre }}</td>
                                <td class="text-right table-warning">{{ $banco->monto_apertura }}</td>
                                <td class="text-right table-danger">{{ $banco->monto_cierre }}</td>
                                <td class="text-center"><span class="btn btn-danger">{{ $banco->estado }}</span></td>
                                <td>
                                    <a title="Ver Detalle" href="{{url('extracto/'.$banco->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    
                                    <a title="Editar" href="{{ url('banco/' . $banco->id . '/edit') }}" class="btn btn-warning">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ url('banco/' . $banco->id) }}" method="post" class="d-inline">
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


            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#bancos').DataTable(castellano);
        });
        const castellano = {
            "language": {
                "search": "Buscar",
                "lengthMenu": "Mostrar _MENU_ registros por página",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente",
                    "first": "Primero",
                    "last": "Ultimo"
                }
            }
        }
    </script>
@endsection

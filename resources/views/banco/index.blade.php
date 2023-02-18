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

            {{-- <a class="btn btn-danger" href="{{ url('banco') }}">Volver Atras</a> --}}
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#bancoModal">
            ✚ Añadir Extracto Bancario
            </button>
            <a class="btn btn-danger" href="{{ url('home') }}">Volver Atras</a>
            @include('modal.bancomodal')

            <div class="pt-4">
                <table id="bancos" class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Fecha</th>
                            <th>Plataforma</th>
                            <th>Apertura⬇</th>
                            <th>Depósitos ⬇</th>
                            <th>Capital Utilizado ⬆</th>
                            <th>Retiros ⬆</th>
                            <th>Cierre ⬆</th>
                            <th>Movimientos</th>
                            <th>Comisión</th>
                            <th>Check</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bancos as $banco)
                            <tr class="text-right">
                                <td >{{ $banco->id }}</td>
                                <td class="table-secondary">{{ $banco->fecha_cierre }}</td>
                                <td>{{$banco->plataforma?->nombre}}</td>
                                <td class="table-info">{{ number_format($banco->monto_apertura,2) }}</td>
                                <td class="table-success">{{number_format($banco->total_depositos,2)}}</td>
                                <td class="table-primary">{{number_format($banco->total_capital_utilizado,2)}}</td>
                                <td class="table-warning">{{number_format($banco->total_retiros,2)}}</td>
                                <td class="table-danger">{{ number_format($banco->monto_cierre,2) }}</td>
                                <td class="table-secondary">{{$banco->total_movimientos}}</td>
                                <td class="table-dark">{{number_format($banco->total_comision,2)}}</td>
                                <td class="text-center"> 
                                    @if ($banco->diferencia=='0')
                                    <i class="fas fa-check-square btn-success" style="font-size: 1.7em;"></i>    
                                    @else
                                    <i class="fas fa-window-close btn-danger btn-success" style="font-size: 1.7em;"></i>
                                    <br><span class="text-danger">{{$banco->diferencia}}</span>
                                    @endif
                                    </td>
                                <td class="text-center"><span class="btn btn-danger">{{ $banco->estado }}</span></td>
                                <td>
                                    <a title="Ver Detalle" href="{{url('extracto/'.$banco->id) }}" class="btn btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a tittle="Ver Totales" href="{{url('cuantificador/'.$banco->id) }}" class="btn btn-success" >
                                        <i class="fas fa-calculator"></i>   
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

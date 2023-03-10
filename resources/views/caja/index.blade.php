@extends('layout.adminlte')

@section('content')
    <div class="card col-12">
        <div class="card-body">
            <h1>Listado de Cajas</h1>
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

            {{-- <a class="btn btn-danger" href="{{ url('caja') }}">Volver Atras</a> --}}
            <button type="button" id="modalToggle" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#cajaModal">
            ✚ Aperturar Caja
            </button>
            <a class="btn btn-danger" href="{{ url('home') }}">Volver Atras</a>
            @include('modal.cajamodal')

            <div class="pt-4">
                <table id="cajas" class="table table-light">
                    <thead class="thead-light">
                        <tr>
                            <th>Fecha Caja</th>
                            <th>Apertura</th>
                            <th>Productos</th>
                            <th>Servicios</th>
                            <th>Capital Utilizado</th>
                            <th>Impresiones</th>
                            <th>Recargas</th>
                            <th>Depositos </th>
                            <th>Cierre</th>
                            <th>Estado</th>
                            <th>Acciones</th>
    
              {{--               <th>Retiros ⬆</th>
                            <th>Cierre ⬆</th>
                            <th>Movimientos</th>
                            <th>Comisión</th>
                            <th>Check</th>
                            <th>Estado</th>
                            <th>Acciones</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cajas as $caja)
                            <tr class="text-right">
                                <td class="table-info">{{ $caja->fecha_caja }}</td>
                                <td class="table-success">{{number_format($caja->monto_apertura,2)}}</td>
                                <td class="table-success">{{ number_format($caja->total_productos,2) }}</td>
                                <td class="table-success">{{ number_format($caja->total_servicios,2) }}</td>
                                <td class="table-success">{{ number_format($caja->total_capital_utilizado,2) }}</td>
                                <td class="table-success">{{ number_format($caja->total_impresiones,2) }}</td>
                                <td class="table-success">{{ number_format($caja->total_recargas,2) }}</td>
                                <td class="table-danger">{{ number_format($caja->total_depositos,2) }}</td>
                                <td class="table-warning">{{number_format($caja->monto_cierre,2)}}</td>
                                
                       {{--          <td class="text-center"> 
                                    @if ($caja->diferencia=='0')
                                    <i class="fas fa-check-square btn-success" style="font-size: 1.7em;"></i>    
                                    @else
                                    <i class="fas fa-window-close btn-danger btn-success" style="font-size: 1.7em;"></i>
                                    <br><span class="text-danger">{{$caja->diferencia}}</span>
                                    @endif
                                    </td> --}}
                                {{-- <td class="text-center"><span class="btn btn-danger">{{ $caja->estado }}</span></td> --}}
                                <td><span class="badge bg-danger">ABIERTO</span></td>
                                <td>
                                    <a title="Añadir Ingresos" href="{{url('ventas/'.$caja->id) }}" class="btn btn-success">
                                    <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                    </a>
                                    <a title="Añadir Ingresos" href="{{url('ventas/'.$caja->id) }}" class="btn btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        </a>
                                    <a title="Añadir Egresos" href="{{url('detalle_egresos/'.$caja->id) }}" class="btn btn-danger" >
                                        <i class="fa fa-minus"></i>   
                                    </a>
                                    
                                    <a title="Editar" href="{{ url('caja/' . $caja->id . '/edit') }}" class="btn btn-warning">
                                        <i class="fas fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <form action="{{ url('caja/' . $caja->id) }}" method="post" class="d-inline">
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
<script>window.Laravel = {csrfToken: '{{csrf_token()}}'}</script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {

            $('#cajas').DataTable(castellano);
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
    <script src="{{asset('js/caja.js')}}"></script>
@endsection

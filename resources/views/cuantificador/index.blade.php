@extends('layout.adminlte')
@section('content')
@php
    $totalCantidad =0;
    $totalComision = 0;
    $totalCapital = 0;
    $totalTotal = 0;
@endphp
    <div class="">
        @if (Session::has('mensaje'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('mensaje') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- <a class="btn btn-success" href="{{ url('cuantificador/create') }}">Registrar Nueva cuantificador</a> --}}

        <table class="table table-light ">
            <thead class="thead-light align-middle">
                <tr>
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Monto</th>
                    <th>Sigla Servicio</th>
                    <th>Cantidad</th>
                    <th>Capital</th>
                    <th>Comision</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($cuantificadores as $cuantificador)
                    <tr
                        class="@if (trim($cuantificador->monto) == '-17.00' &&
                                trim($cuantificador->descripcion) == 'N/D PAGO SEGIP MEDIANTE UNINET') table-danger
                    @elseif (trim($cuantificador->monto) == '-80.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET')
                        table-warning                        
                    @elseif (trim($cuantificador->monto) == '-200.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR')
                        table-success  
                    @elseif (trim($cuantificador->monto) == '-225.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET')
                    table-warning                         
                    @elseif (trim($cuantificador->monto) == '-30.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT')
                        table-primary    
                        @elseif (trim($cuantificador->monto) == '-50.00' &&
                        trim($cuantificador->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT')
                    table-primary                            
                    @elseif (trim($cuantificador->monto) == '-20.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT')
                    table-primary                           
                    @elseif (trim($cuantificador->monto) == '-50.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR')
                    table-success
                    @elseif (trim($cuantificador->monto) == '-80.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR')
                    table-success                        
                    @elseif (trim($cuantificador->monto) == '-10.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET')                            
                       table-info                           
                    @elseif (trim($cuantificador->monto) == '-160.00' &&
                            trim($cuantificador->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET')
                    table-warning                             
                    @elseif (trim($cuantificador->monto) == '-60.00' &&
                            trim($cuantificador->descripcion) == 'N/D TRASP. A ANH - RECAUDADORA')    
                        table-secondary
                    @else
                        P_OTROS @endif">
                        <td>{{ $cuantificador->id_archivo }}</td>
                        <td>{{ $cuantificador->servicio?->nombre }}</td>
                        <td class="text-center">{{ $cuantificador->monto }}</td>
                        <td class="text-center">{{ $cuantificador->servicio?->sigla }}</td>
                        <td value="{{$totalCantidad+=$cuantificador->cantidad}}" class="text-center h4 table-light"><kbd>{{number_format($cuantificador->cantidad, 0 )  }}</kbd></td>
                        <td value="{{$totalCapital+=$cuantificador->servicio?->costo *$cuantificador->cantidad}}" class="text-center h4 table-danger"><kbd>{{ number_format($cuantificador->servicio?->costo *$cuantificador->cantidad , 2 ) }}</kbd></td>
                        <td value="{{$totalComision+=$cuantificador->servicio?->diferencia * $cuantificador->cantidad}}" class="text-center h4 table-warning"><kbd>{{ number_format($cuantificador->servicio?->diferencia * $cuantificador->cantidad , 2 )}}</kbd></td>
                        <td value="{{$totalTotal+=$cuantificador->servicio?->precio * $cuantificador->cantidad}}" class="text-center h4 table-success"><kbd>{{number_format($cuantificador->servicio?->precio * $cuantificador->cantidad, 2 )}}</kbd></td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot class="table table-dark text-center h3 bold">
                <td  colspan="4">TOTALES</td>
                <td class="text-center">{{$totalCantidad}}</td>
                <td class="text-center">{{number_format($totalCapital, 2 )}}</td>
                <td class="text-center">{{number_format($totalComision, 2 )}}</td>
                <td class="text-center">{{number_format($totalTotal, 2 )}}</td>  
                </tfoot>
        </table>
       {{--  {!! $cuantificadores->links() !!} --}}
        <a class="btn btn-danger" href="{{ url('extracto') }}">Volver Atras</a>
    </div>
@endsection

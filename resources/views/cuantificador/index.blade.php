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
                <tr class="text-center">
                    <th>#</th>
                    <th>Descripcion</th>
                    <th>Deposito</th>
                    <th>Retiro</th>
                    <th>Sigla Servicio</th>
                    <th>Cantidad</th>
                    <th>Capital</th>
                    <th>Comision</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody class="align-middle">
                @foreach ($cuantificadores as $cuantificador)
                <tr class="table-{{$cuantificador->servicio?->color}}">
                        <td>{{ $cuantificador->id_servicio }}</td>
                        <td>{{ $cuantificador->servicio?->nombre }}<br>{{$cuantificador->descripcion}}</td>
                        <td class="text-center">{{ $cuantificador->deposito}}</td>
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
                <td  colspan="5">TOTALES</td>
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

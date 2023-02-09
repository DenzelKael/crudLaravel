@extends('layout.adminlte') 
@section('content')
    <div class="">
        
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Nro Extracto</th>
                    <th>Nro Archivo</th>
                    <th>Nro Servicio</th>
                    <th>Fecha</th>
                    <th>AG</th>
                    <th>Descripcion</th>
                    <th>Nro Documento</th>
                    <th>Monto</th>
                    <th>Saldo</th>
                    <th>Sigla</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($extractos as $extracto)
                
                    <tr class="@if ((trim($extracto->monto) == '-17.00' || trim($extracto->monto) == '17')  &&
                        (trim($extracto->descripcion) == 'N/D PAGO SEGIP MEDIANTE UNINET'
                        || trim($extracto->descripcion)=='Debito por pago de servicio SEGIP CEDULAS DE IDENTIDAD NACIONAL')) table-danger
            @elseif (trim($extracto->monto) == '-80.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET')
                table-warning                        
            @elseif (trim($extracto->monto) == '-200.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR')
                table-success  
            @elseif ((trim($extracto->monto) == '-225.00' || trim($extracto->monto) == '225') &&
                    (trim($extracto->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET'
                    || trim($extracto->descripcion) == 'Debito por pago de servicio SEGIP LICENCIAS DE CONDUCIR NACIONAL'))
            table-warning                         
            @elseif (trim($extracto->monto) == '-30.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT')
                table-primary    
                @elseif (trim($extracto->monto) == '-50.00' &&
                trim($extracto->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT')
            table-primary                            
            @elseif (trim($extracto->monto) == '-20.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO IMPUESTOS VIA WEB RUAT')
            table-primary                           
            @elseif (trim($extracto->monto) == '-50.00' &&
                    trim($extracto->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR')
            table-success
            @elseif ((trim($extracto->monto) == '-80.00' || trim($extracto->monto) == '80') &&
                    (trim($extracto->descripcion) == 'N/D PAGO CERT. ANTECEDENTES CUDAP QR'
                    || trim($extracto->descripcion)=='Debito por pago de servicio SEGIP LICENCIAS DE CONDUCIR NACIONAL'))
            table-success                        
            @elseif ((trim($extracto->monto) == '-10.00' || trim($extracto->monto) == '10') &&
                    (trim($extracto->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET' 
                    || trim($extracto->descripcion) == 'Debito por pago de servicio SEGIP CERTIFICACIONES EXTRANJERO' 
                    || trim($extracto->descripcion) == 'Debito por pago de servicio SEGIP CERTIFICACIONES')) 
               table-info                           
            @elseif ((trim($extracto->monto) == '-160.00' || trim($extracto->monto) == '160') &&
                    (trim($extracto->descripcion) == 'N/D PAGO SEGELIC MEDIANTE UNINET'
                    || trim($extracto->descripcion=='Debito por pago de servicio SEGIP LICENCIAS DE CONDUCIR NACIONAL')))
            table-warning                             
            @elseif (trim($extracto->monto) == '-60.00' &&
                    trim($extracto->descripcion) == 'N/D TRASP. A ANH - RECAUDADORA')    
                table-secondary
            @else
                P_OTROS @endif">
                        
                        <td>{{ $extracto->id }}</td>
                        <td>{{ $extracto->id_archivo }}</td>
                        <td>{{ $extracto->id_servicio }}</td>
                        <td>{{ $extracto->fecha }}</td>
                        <td>{{ $extracto->AG }}</td>
                        <td>{{ $extracto->descripcion }}</td>
                        <td>{{ $extracto->nro_documento }}</td>
                        <td>{{ $extracto->monto }}</td>
                        <td>{{ $extracto->saldo }}</td>
                        <td>{{ $extracto->sigla }}</td>
                     {{--    <td>
                            <a href="{{ url('extracto/' . $extracto->id . '/edit') }}" class="btn btn-warning">Editar</a>


                            <form action="{{ url('extracto/' . $extracto->id) }}" method="post" class="d-inline">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input class="btn btn-danger" type="submit"
                                    onclick="return confirm('¿Quieres realmente borrar?')" value="Borrar">
                            </form>

                        </td> --}}
                    </tr>
                    
                @endforeach
            </tbody>
        </table>
        {!! $extractos->links()!!}
        <a class="btn btn-danger" href="{{ url('archivo') }}">Volver Atras</a>
        <a class="btn btn-warning" href="{{ url('cuantificador/'.$extracto->id_archivo) }}">Cuantificar</a>
    </div>
@endsection
<script src="{{asset('js/extractos.js')}}"></script>

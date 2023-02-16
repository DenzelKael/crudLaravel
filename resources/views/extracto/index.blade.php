@extends('layout.adminlte') 
@section('content')
    <div class="">
        
        <table class="table table-light">
            <thead class="thead-light">
                <tr>
                    <th>Nro Extracto</th>
                    <th>Nro Banco</th>
                    <th>Nro Servicio</th>
                    <th>Fecha</th>
                    <th>AG</th>
                    <th>Descripcion</th>
                    <th>Nro Documento</th>
                    <th>Deposito</th>
                    <th>Retiro</th>
                    <th>Saldo</th>
                    <th>Sigla</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($extractos as $extracto)
                
                    <tr class="table-{{$extracto->servicio?->color}}">
                        
                        <td>{{ $extracto->id }}</td>
                        <td>{{ $extracto->id_banco }}</td>
                        <td>{{ $extracto->id_servicio }}</td>
                        <td>{{ $extracto->fecha }}</td>
                        <td>{{ $extracto->AG }}</td>
                        <td>{{ $extracto->descripcion }}</td>
                        <td>{{ $extracto->nro_documento }}</td>
                        <td>{{ $extracto->deposito }}</td>
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
        <a class="btn btn-danger" href="{{ url('banco') }}">Volver Atras</a>
        <a class="btn btn-warning" href="{{ url('cuantificador/'.$extracto->id_banco) }}">Cuantificar</a>
    </div>
@endsection
<script src="{{asset('js/extractos.js')}}"></script>

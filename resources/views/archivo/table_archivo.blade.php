<div class="card col-12 col-lg-{{$card_lg?? '8'}}">
          
    <div class="card-body">
        <h3>Listado de Archivos</h3>
        <div class="bg-opacity-10 ">
            @if (Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <br><br>
            <table class="table table-responsive  ">
                <thead class="thead-light align-middle">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>ID Plataforma</th>
                  
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody class="align-middle">
                    @foreach ($archivos as $archivo)
                        <tr>
                            <td>{{ $archivo->id }}</td>
                            <td style="text-transform: uppercase">{{ $archivo->nombres }}</td>
                            <td>{{ $archivo->fecha }}</td>
                            <td>{{ $archivo->plataformas }}</td>
                         
                            <td>
                                <a title="Ver Extracto" href="{{url('extracto/'.$archivo->fecha) }}" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                {{-- <a href="{{ url('archivo/' . $archivo->id . '/edit') }}" class="btn btn-warning">Editar</a> --}}
                             {{--    <form action="{{ url('archivo/' . $archivo->id) }}" method="post" class="d-inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button title="Eliminar" class="btn btn-danger" type="submit"
                                        onclick="return confirm('¿Quieres realmente borrar?')" >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $archivos->links() !!}
        </div>
    </div>
</div>
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
                          
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $archivos->links() !!}
        </div>
    </div>
</div>
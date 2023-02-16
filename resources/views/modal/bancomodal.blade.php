  <!-- Modal -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
  integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
</script>
  <div class="modal fade" id="bancoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Extracto Bancario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             
                <form action="{{ url('banco') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id_user" class="col-form-label">Usuario:</label>
                        <input type="text" class="form-control" name="" id="id_user" readonly value="{{ Auth::user()->name }}">
                        <input type="text" class="form-control" name="id_user" id="id_user" hidden value="{{ Auth::user()->id }}">
                    </div>
                    <div class="mb-3">
                        <label for="fecha_cierre" class="col-form-label">Fecha de Apertura:</label>
                        <input type="date" class="form-control" name="fecha_cierre" id="fecha_cierre"  value="{{ date('Y-m-d') }}">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion">Seleccione Plataforma Bancaria:</label><br>
                        
                        <select class="form-control form-select" name="id_plataforma" id="plataforma">
                            @foreach ($plataformas as $key => $plataforma)
                                <option class="danger" value="{{ $key }}" name="{{ $plataforma }}">
                                    {{ $plataforma }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="archivo">Archivo de Excel:</label>
                        <input type="file" class="form-control" name="archivo" value="" id="archivo">
                    </div>

            </div>
            <div class="modal-footer">
                <input class="btn btn-success" type="submit" value="Guardar Apertura de banco">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            </div>
            </form>
        </div>
    </div>
</div>
  <!-- Modal -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
  integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
</script>
  <div class="modal fade" id="cajaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">

                <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Extracto Bancario</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
             
                <form action="{{ url('caja') }}" method="post" id="form-apertura-caja" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="id_user" class="col-form-label">Usuario:</label>
                        <input type="text" class="form-control" name="" id="id_user" readonly value="{{ Auth::user()->name }}">
                        <input type="text" class="form-control" name="id_user" id="id_user" hidden value="{{ Auth::user()->id }}">
                    </div>
                    <div id="extractos" >
                      
                    </div>
                    <div class="mb-3">
                        <label for="fecha_apertura_caja" class="col-form-label">Fecha de Apertura:</label>
                        <input type="date" class="form-control" name="fecha_cierre" id="fecha_apertura_caja"  value="{{ date('Y-m-d') }}">
                    </div>
                
                    <div class="mb-3">
                        <label for="monto_inicial">Monto Inicial de Apertura de Caja:</label>
                        <input type="number" class="form-control" name="monto_inicial_caja" value="" id="monto_inicial_caja">
                    </div>
                    <div class="mb-3">
                        <label for="total_productos_caja">Total Venta de Productos:</label>
                        <input type="number" class="form-control" name="total_productos_caja" value="" id="total_productos_caja">
                    </div>
                    <div class="mb-3">
                        <label for="total_impresiones_caja">Total Copias e Impresiones:</label>
                        <input type="number" class="form-control" name="total_impresiones_caja" value="" id="total_impresiones_caja">
                    </div>
                    <div class="mb-3">
                        <label for="total_recargas_caja">Total recargas:</label>
                        <input type="number" class="form-control" name="total_recargas_caja" value="" id="total_recargas_caja">
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
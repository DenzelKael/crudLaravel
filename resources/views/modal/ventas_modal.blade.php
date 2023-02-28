<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
    integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
</script>


<!-- Modal -->
<div class="modal fade " id="ventasModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Detalle de la Venta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <div class="d-flex" id="form-ventas" role="search">
                        <button type="button" class="btn btn-primary">
                            <i class="fas fa-search"></i>
                        </button>
                        <input class="form-control me-2" type="text" id="search" placeholder="Buscar por nombre del Producto"
                            aria-label="search">
                    </div>
                    
                </div>
                <div class="mb-3">
                    <form action="">
                        <label for="cantidad"><span class="bold">Cantidad</span> <br>
                            <input class="form-control" type="number" name="cantidad" id="cantidad"
                                placeholder="0.00">
                        </label>
                        <label for="precio_compra"><span class="bold">Precio de Compra</span> <br>
                            <input class="form-control" type="number" name="precio_compra" id="precio_compra"
                                placeholder="0.00">
                        </label>
                        <label for="precio_venta"><span class="bold">Precio de Venta</span> <br>
                            <input class="form-control" type="number" name="precio_venta" id="precio_venta"
                                placeholder="0.00">
                        </label>
                        <button type="button" class="btn btn-primary"> 
                            <i class="fa fa-cart-plus" aria-hidden="true"></i> Agregar</button>
                    </form>
                </div>
                <div class="mb-3">
                    <table class="table table-light ">
                        <thead class="thead-light align-middle">
                            <tr>
                                <th>#</th>
                                <th>Id Producto</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio de Compra</th>
                                <th>Precio de Venta</th>
                                <th>SubTotal</th>
                                <th><i class="fa fa-trash" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">

                            <tr>
                                <td>Id</td>
                                <td></td>
                                <td style="text-transform: uppercase"></td>
                                <td>Cantidad</td>
                                <td></td>
                                <td></td>
                                <td>SubTotal</td>
                                <td>
                                    <form action="{{ url('banco/') }}" method="post" class="d-inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button title="Eliminar" class="btn btn-danger" type="submit"
                                            onclick="return confirm('¿Quieres realmente borrar?')">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </form>


                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
        </div>
     
    </div>
</div>
</div>

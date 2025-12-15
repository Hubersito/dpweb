<?php
$base = defined('BASE_URL') ? BASE_URL : '/';
?>

<div class="container py-3">

    <div class="row mb-3">
        <div class="col-4 mx-auto">
            <div class="border rounded shadow-sm bg-light">
                <input onkeyup="ListaProductosParaVenta();"
                    type="text" id="busqueda_venta" class="form-control" placeholder=" Escribe el nombre o código del producto...">
                <input type="hidden" id="id_producto_venta">
                <input type="hidden" id="producto_precio_venta">
                <!-- se sabe que el valor ´por defecto es 1-->
                <input type="hidden" id="producto_cantidad_venta" value="1">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="row g-2" id="productos_venta"></div>
        </div>

        <div class="col-md-4">
            <div id="carrito_grid" class="p-3 border rounded bg-light shadow-sm position-relative" style="min-height: 500px; display: flex; flex-direction: column;">

                <h5 class="text-center mb-3">🛒 Carrito de Compras</h5>
                <div class="table-responsive">
                    <table class="table table-sm table-hover align-middle mb-0">
                        <thead class="table-primary text-center">
                            <tr>
                                <th>Product.</th>
                                <th>Cant.</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="tablaCarrito">
                            <!-- Los productos agregados al carrito se mostrarán aquí -->

                        </tbody>
                    </table>

                    <div class="card mt-3 shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-end">
                                    Subtotal General: <label id="subtotal_final"></label>
                                </div>
                                <div class="col-12 text-end">
                                    IGV (18%): <label id="igv_final"></label>
                                </div>
                                <div class="col-12 text-end fw-bold">
                                    Total a Pagar: <label id="total_final"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Button trigger modal -->

                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Realizar Venta</button>

                <!-- Modal -->
                <div class="modal fade modal-lg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Registrar Venta</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="form_venta">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="cliente_dni" class="form-label">Dni del Cliente</label>
                                            <input type="text" class="form-control" id="cliente_dni" name="cliente_dni" >
                                        </div>

                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-primary mt-4" onclick="buscarCliente()">Buscar Cliente</button>
                                        </div>

                                        <div class="col-md-12">
                                            <label for="cliente_nombre" class="form-label">Nombre del Cliente</label>
                                            <input type="text" class="form-control" id="cliente_nombre" name="cliente_nombre" readonly>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="fecha_venta" class="form-label">Fecha de Venta</label>
                                            <input type="datetime" class="form-control" id="fecha_venta" name="fecha_venta" value="<?= date('Y-m-d H:i'); ?>" >

                                        </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Vender</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>






<script src="<?php echo BASE_URL; ?>view/function/producto.js"></script>
<script src="<?php echo BASE_URL; ?>view/function/venta.js"></script>
<script>
    let input = document.getElementById("busqueda_venta");
    input.addEventListener('keydown', event => {
        if (event.key == 'Enter') {
            agregar_producto_temporal();
        }
    });
</script>
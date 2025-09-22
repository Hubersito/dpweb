<!-- INICIO DE CUERPO DE PAGINA -->
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0"><i class="bi bi-box-seam me-2"></i>Registrar Producto</h5>
                </div>
                <form id="frm_producto" action="" method="" enctype="multipart/form-data">
                    <div class="card-body bg-light">
                        <div class="mb-3 row align-items-center">
                            <label for="codigo" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-upc"></i> Código:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-primary" id="codigo" name="codigo" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="nombre" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-box"></i> Nombre:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-primary" id="nombre" name="nombre" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="detalle" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-card-text"></i> Detalle:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-primary" id="detalle" name="detalle" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="precio" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-currency-dollar"></i> Precio:
                            </label>
                            <div class="col-sm-8">
                                <input type="number" step="0.01" class="form-control border-primary" id="precio" name="precio" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="stock" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-stack"></i> Stock:
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control border-primary" id="stock" name="stock" required>
                            </div>
                        </div>
                         <div class="mb-3 row align-items-center">
                            <label for="categoria" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-tags"></i> Categoría:
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control border-primary" id="categoria" name="categoria" required>
                                    <option value="" disabled selected>Seleccione</option>
                                    <!-- Opciones dinámicas -->
                                </select>
                            </div>
                        </div>

                        <div class="mb-3 row align-items-center">
                            <label for="fecha_vencimiento" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-calendar-event"></i> Fecha de Vencimiento:
                            </label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control border-primary" id="fecha_vencimiento" name="fecha_vencimiento" required>
                            </div>
                        </div>

                        <!-- Campo para cargar imagen (agregado) -->
                        <div class="mb-3 row align-items-center">
                            <label for="imagen" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-image"></i> Imagen:
                            </label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control border-primary" id="imagen" name="imagen" accept=".jpg, .jpeg, .png" required>
                            </div>
                        </div>

                        <div class="mb-3 row align-items-center">
                            <label for="proveedor" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-truck"></i> Proveedor:
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control border-primary" id="proveedor" name="proveedor" required>
                                    <option value="" disabled selected>Seleccione</option>
                                    <!-- Opciones dinámicas -->
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-check-circle"></i> Registrar
                            </button>

                            <button type="button" class="btn btn-primary px-4" onclick="window.location.href='list-products'">
                                <i class="bi bi-list"></i> Lista de Productos
                            </button>

                            <button type="button" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-x-circle"></i> Cancelar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- FIN DE CUERPO DE PAGINA -->
<script src="<?php echo BASE_URL; ?>view/function/products.js"></script>
<script>
    cargar_categorias();
</script>
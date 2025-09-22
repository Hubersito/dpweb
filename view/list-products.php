<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0"><i class="bi bi-people-fill me-2"></i>Lista de Productos</h4>
                    <a href="<?= BASE_URL ?>products" class="btn btn-success btn-sm">
                        <i class="bi bi-person-plus"></i> Nuevo Producto
                    </a>
                </div>
                <div class="card-body bg-light">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>#</th>
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Detalle</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Categoría</th>
                                    <th>Fecha Vencimiento</th>
                                </tr>
                            </thead>
                            <tbody id="content_products">
                                <!-- Contenido dinámico -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= BASE_URL ?>view/function/products.js"></script>
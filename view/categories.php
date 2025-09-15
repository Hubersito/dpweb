<!-- INCIO DE CUERPO DE PAGINA -->
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h5 class="mb-0"><i class="bi bi-tags-fill me-2"></i>Categorías</h5>
                </div>
                <form id="frm_categoria" action="" method="">
                    <div class="card-body bg-light">
                        <div class="mb-3 row align-items-center">
                            <label for="nombre" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-tag"></i> Nombre de Categoría:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-primary" id="nombre" name="nombre" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="detalle" class="col-sm-4 col-form-label fw-semibold text-success">
                                <i class="bi bi-card-text"></i> Detalle de Categoría:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-success" id="detalle" name="detalle" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-check-circle"></i> Registrar
                            </button>

                            <button type="button" class="btn btn-primary px-4" onclick="window.location.href='list-categorie'">
                                <i class="bi bi-list"></i> Lista de Categorías
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
<script src="<?php echo BASE_URL; ?>view/function/categoria.js"></script>

<!-- INICIO DE CUERPO DE PAGINA -->
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h4 class="mb-0"><i class="bi bi-person-plus-fill me-2"></i>Registro de Usuario</h4>
                </div>
                <form id="frm_user" action="" method="">
                    <div class="card-body bg-light">
                        <div class="mb-3 row align-items-center">
                            <label for="nro_identidad" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-credit-card-2-front"></i> Nro de Documento:
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control border-primary" id="nro_identidad" name="nro_identidad" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="razon_social" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-person-badge"></i> Razón Social:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-primary" id="razon_social" name="razon_social" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="telefono" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-telephone"></i> Teléfono:
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control border-primary" id="telefono" name="telefono" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="correo" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-envelope"></i> Correo:
                            </label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control border-primary" id="correo" name="correo" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="departamento" class="col-sm-4 col-form-label fw-semibold text-success">
                                <i class="bi bi-geo-alt"></i> Departamento:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-success" id="departamento" name="departamento" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="provincia" class="col-sm-4 col-form-label fw-semibold text-success">
                                <i class="bi bi-geo"></i> Provincia:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-success" id="provincia" name="provincia" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="distrito" class="col-sm-4 col-form-label fw-semibold text-success">
                                <i class="bi bi-geo-fill"></i> Distrito:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-success" id="distrito" name="distrito" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="cod_postal" class="col-sm-4 col-form-label fw-semibold text-success">
                                <i class="bi bi-mailbox"></i> Código Postal:
                            </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control border-success" id="cod_postal" name="cod_postal" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="direccion" class="col-sm-4 col-form-label fw-semibold text-success">
                                <i class="bi bi-signpost"></i> Dirección:
                            </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control border-success" id="direccion" name="direccion" required>
                            </div>
                        </div>
                        <div class="mb-3 row align-items-center">
                            <label for="rol" class="col-sm-4 col-form-label fw-semibold text-primary">
                                <i class="bi bi-person-gear"></i> Rol:
                            </label>
                            <div class="col-sm-8">
                                <select class="form-control border-primary" name="rol" id="rol" required>
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="Administrador">Administrador</option>
                                    <option value="Empleado">Empleado</option>
                                    <option value="Almacen">Almacen</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-check-circle"></i> Registrar
                            </button>
                            <button type="reset" class="btn btn-primary px-4">
                                <i class="bi bi-eraser"></i> Limpiar
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
<script src="<?php echo BASE_URL; ?>view/function/user.js"></script>
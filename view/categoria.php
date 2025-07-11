
<!-- INCIO DE CUERPO DE PAGINA -->
    <div class="container-fluid">
        <div class="card">
            <h5 class="card-header"><span class="text-success">Categ</span><span class="text-warning">ories</span></h5>
            <form id="frm_categoria" action="" method="">
                <div class="card-body">

                    <div class="mb-3 row">
                        <label for="nombre" class="col-sm-4 col-form-label">Nombre de Categoria</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="nombre" name="nombre" required>
                        </div>
                    </div>



                    <div class="mb-3 row">
                        <label for="detalle" class="col-sm-4 col-form-label">Detalle de Categoria:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="detalle" name="detalle" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success">Registrar</button>
                    <button type="reset" class="btn btn-primary">Limpiar</button>
                    <button type="button" class="btn btn-warning">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
<!-- FIN DE CUERPO DE PAGINA -->
 <script src="<?php echo BASE_URL; ?>view/function/categoria.js"></script>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-danger" href="#">Lo<span class="letra text-warning">go</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link home text-primary" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary text-success" href="#">Use<span class="text-primary">rs</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Prod<span>ucts</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Categ<span>ories</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Clie<span>nts</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Sho<span>ps</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="#">Sal<span>es</span></a>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dropdown
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>
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
</body>
<script src="<?php echo BASE_URL; ?>view/function/categoria.js"></script>
<script src="<?php echo BASE_URL; ?>view/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



</html>
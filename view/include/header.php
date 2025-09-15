<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HuberA-E</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>view/bootstrap/css/bootstrap.min.css">
    <!-- Bootstrap Icons CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <script>
        const base_url = '<?php echo BASE_URL; ?>';
    </script>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand text-danger" href="#">
                <i class="bi bi-box-arrow-in-right"></i> Lo<span class="letra text-warning">gin</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link home text-primary" aria-current="page" href="new-user">
                            <i class="bi bi-house-door"></i> Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" href="<?= BASE_URL ?>users">
                            <i class="bi bi-people"></i> Use<span class="letra text-danger">rs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="<?= BASE_URL ?>products">
                            <i class="bi bi-box-seam"></i> Prod<span>ucts</span>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="<?= BASE_URL ?>categories">
                            <i class="bi bi-tags"></i> Categ<span>ories</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="<?= BASE_URL ?>clients">
                            <i class="bi bi-person-badge"></i> Clie<span>nts</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="<?= BASE_URL ?>shops">
                            <i class="bi bi-shop"></i> Sho<span>ps</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-primary" href="<?= BASE_URL ?>sales">
                            <i class="bi bi-cash-stack"></i> Sal<span>es</span>
                        </a>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> Usuario
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#"><i class="bi bi-gear"></i> Configuración</a></li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-info-circle"></i> Ayuda</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-right"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
    </nav>

<?php
require_once '../model/ProductsModel.php';

class ProductsController
{
    private $model;

    public function __construct()
    {
        $this->model = new ProductsModel();
    }

    // Mostrar formulario de productos
    public function index()
    {
        require '../view/products.php';
    }

    // Guardar producto
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'codigo'            => $_POST['codigo'] ?? '',
                'nombre'            => $_POST['nombre'] ?? '',
                'detalle'           => $_POST['detalle'] ?? '',
                'precio'            => $_POST['precio'] ?? '',
                'stock'             => $_POST['stock'] ?? '',
                'id_categoria'      => $_POST['id_categoria'] ?? '',
                'fecha_vencimiento' => $_POST['fecha_vencimiento'] ?? ''
            ];
            $result = $this->model->insertProduct($data);
            if ($result) {
                header('Location: ../view/products.php?success=1');
            } else {
                header('Location: ../view/products.php?error=1');
            }
            exit;
        }
    }

    // Obtener categorías (para el select)
    public function getCategorias()
    {
        $categorias = $this->model->getCategorias();
        header('Content-Type: application/json');
        echo json_encode($categorias);
    }
}

// Ruteo simple
$controller = new ProductsController();

if (isset($_GET['action']) && $_GET['action'] === 'store') {
    $controller->store();
} elseif (isset($_GET['action']) && $_GET['action'] === 'categorias') {
    $controller->getCategorias();
} else {
    $controller->index();
}
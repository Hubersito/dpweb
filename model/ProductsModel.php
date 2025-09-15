
<?php
require_once 'conexion.php';

class ProductsModel
{
    private $db;

    public function __construct()
    {
        $this->db = Conexion::getConexion();
    }

    // Insertar un nuevo producto
    public function insertProduct($data)
    {
        $sql = "INSERT INTO productos (codigo, nombre, detalle, precio, stock, id_categoria, fecha_vencimiento)
                VALUES (:codigo, :nombre, :detalle, :precio, :stock, :id_categoria, :fecha_vencimiento)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':codigo'            => $data['codigo'],
            ':nombre'            => $data['nombre'],
            ':detalle'           => $data['detalle'],
            ':precio'            => $data['precio'],
            ':stock'             => $data['stock'],
            ':id_categoria'      => $data['id_categoria'],
            ':fecha_vencimiento' => $data['fecha_vencimiento']
        ]);
    }

    // Obtener todas las categorías
    public function getCategorias()
    {
        $sql = "SELECT id, nombre FROM categorias";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
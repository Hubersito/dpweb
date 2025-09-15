<?php
require_once("../model/CategoriaModel.php");
$objCategoria = new CategoriaModel();

$tipo = $_GET['tipo'];

if ($tipo == "registrar") {
    //print_r($_POST);
    $nombre = $_POST['nombre'];
    $detalle = $_POST['detalle'];

    if (
        $nombre == "" || $detalle == ""
    ) {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        //validacion si existe persona con el mismo dni
        $existeCategoria = $objCategoria->existeCategoria($nombre);
        if ($existeCategoria > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error, categoria ya existe');
        } else {
            $respuesta = $objCategoria->registrar($nombre, $detalle,);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'Registrado Correctamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error, fallo en registro');
            }
        }
    }
    echo json_encode($arrResponse);
}
if ($tipo == "ver_categorias") {
    $categories = $objCategoria->verCategoria();
    echo json_encode($categories);
}
if ($tipo == "ver") {
    //print_r($_POST);
    $respuesta = array('status' => false, 'msg' => 'Error');
    $id_categoria = $_POST['id_categoria'];
    $categories = $objCategoria->ver($id_categoria);
    if ($categories) {
        $respuesta['status'] = true;
        $respuesta['data'] = $categories;
    } else {
        $respuesta['msg'] = 'Error, categoria no existe';
    }
    echo json_encode($respuesta);
}


// Metodo para Elimar categoria 
if ($tipo == "eliminar") {
    // El JS envía 'id', no 'id_persona'
    $id_categoria = isset($_POST['id']) ? $_POST['id'] : '';

    if ($id_categoria == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, ID vacío');
    } else {
        $existeId = $objCategoria->ver($id_categoria);
        if (!$existeId) {
            $arrResponse = array('status' => false, 'msg' => 'Error, categoria no existe en Base de Datos!!');
        } else {
            $eliminar = $objCategoria->eliminar($id_categoria);
            if ($eliminar) {
                $arrResponse = array('status' => true, 'msg' => "Eliminado correctamente");
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error al eliminar');
            }
        }
    }
    echo json_encode($arrResponse);
    exit;
}
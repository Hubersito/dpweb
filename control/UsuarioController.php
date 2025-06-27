<?php
require_once("../model/UsuarioModel.php");
$objPersona= new UsuarioModel();
$tipo =$_GET['tipo'];
if ($tipo=='registrar') {

    //print_r($_POST);
    $nro_doc =$_POST['nro_doc'];
    $nombre =$_POST['nombre'];
    $telefono =$_POST['telefono'];
    $correo =$_POST['correo'];
    $departamento =$_POST['departamento'];
    $provincia =$_POST['provincia'];
    $distrito =$_POST['distrito'];
    $cod_postal =$_POST['cod_postal'];
    $direccion =$_POST['direccion'];
    $rol =$_POST['rol'];
    //Encriptando nro_documento para utilizarlo como contraseña
    $password =password_hash($nro_doc,PASSWORD_DEFAULT);

    if ($nro_doc == "" || $nombre == "" || $telefono == "" || $correo == "" || $departamento == "" || $provincia == ""|| $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {
    
        $arrResponse= array('status'=>false,'msg'=>'Error,campos vacios');
    }else{
        $respuesta = $objPersona->registrar($nro_doc, $nombre, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password);
        $arrResponse= array('status'=>true,'msg'=>'Procedemos a Registrar');
    }
    echo json_encode($arrResponse);

}
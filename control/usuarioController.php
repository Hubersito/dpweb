<?php
require_once("../model/UsuarioModel.php");

$objPersona = new UsuarioModel();

$tipo = $_GET['tipo'];
if ($tipo == "registrar") {
    //print_r($_POST);
    $nro_identidad = $_POST['nro_identidad'];
    $razon_social = $_POST['razon_social'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $distrito = $_POST['distrito'];
    $cod_postal = $_POST['cod_postal'];
    $direccion = $_POST['direccion'];
    $rol = $_POST['rol'];
    // encriptando contraseña
    $password = password_hash($nro_identidad, PASSWORD_DEFAULT);

    if ($nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == ""  || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        //validacion si existe persona con el mismo dni
        $existePersona = $objPersona->existePersona($nro_identidad);
        if ($existePersona > 0) {
            $arrResponse = array('status' => false, 'msg' => 'Error, nro de documento ya existe');
        } else {

            $respuesta = $objPersona->registrar($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password);
            if ($respuesta) {
                $arrResponse = array('status' => true, 'msg' => 'Registrado corectamente');
            } else {
                $arrResponse = array('status' => false, 'msg' => 'Error, fallo en registro');
            }
        }
    }
    echo json_encode($arrResponse);
}

if ($tipo == "iniciar_sesion") {
    $nro_identidad = $_POST['username'];
    $password = $_POST['password'];
    if ($nro_identidad == "" || $password == "") {
        $respuesta = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        $existePersona = $objPersona->existePersona($nro_identidad);
        if (!$existePersona) {
            $respuesta = array('status' => false, 'msg' => 'Usuario no registrado');
        } else {
            $persona = $objPersona->buscarPersonaPorNroIdentidad($nro_identidad);
            if (password_verify($password, $persona->password)) {
                session_start();
                $_SESSION['ventas_id'] = $persona->id;
                $_SESSION['ventas_usuario'] = $persona->razon_social;
                $respuesta = array('status' => true, 'msg' => 'Iniciaste sesión');
            } else {
                $respuesta = array('status' => false, 'msg' => 'Contraseña incorrecto');
            }
        }
    }
    echo json_encode($respuesta);
}


if ($tipo == "mostrar_usuarios") {
    $usuarios = $objPersona->mostrarUsuarios();
    header('Content-Type: application/json');
    echo json_encode($usuarios);
}

if ($tipo == "obtener_usuario") {
    // Buscar por DNI (nro_identidad) enviado desde la interfaz de ventas
    if (!isset($_POST['dni']) || empty($_POST['dni'])) {
        echo json_encode(array('status' => false, 'msg' => 'Error, dni no existe'));
        exit;
    }
    $dni = $_POST['dni'];
    // utilizar el método que busca por nro_identidad
    $usuario = $objPersona->buscarPersonaPorNroIdentidad($dni);
    header('Content-Type: application/json');
    if ($usuario) {
        echo json_encode(array('status' => true, 'data' => $usuario));
    } else {
        echo json_encode(array('status' => false, 'msg' => 'Error, usuario no encontrado'));
    }
}
if ($tipo == "registrar_cliente_minimo") {
    $dni = isset($_POST['dni']) ? $_POST['dni'] : '';
    $razon_social = isset($_POST['razon_social']) ? $_POST['razon_social'] : '';
    if ($dni == '' || $razon_social == '') {
        echo json_encode(array('status' => false, 'msg' => 'Faltan datos'));
        exit;
    }
    $existe = $objPersona->existePersona($dni);
    if ($existe > 0) {
        $persona = $objPersona->buscarPersonaPorNroIdentidad($dni);
        echo json_encode(array('status' => true, 'id' => $persona->id, 'msg' => 'Cliente ya existe'));
        exit;
    }
    $id = $objPersona->registrar_minimo($dni, $razon_social);
    if ($id) {
        echo json_encode(array('status' => true, 'id' => $id, 'msg' => 'Cliente registrado'));
    } else {
        echo json_encode(array('status' => false, 'msg' => 'Error al registrar cliente'));
    }
}

if ($tipo == "ver") {
    $respuesta = array('status' => false, 'msg' => '');
    $id_persona = $_POST['id_persona'];
    $usuario = $objPersona->ver($id_persona);
    if ($usuario) {
        $respuesta['status'] = true;
        $respuesta['data'] = $usuario;
    } else {
        $respuesta['msg'] = 'Error, usuario no existe';
    }
    echo json_encode($respuesta);
}

if ($tipo == "actualizar") {
    //print_r($_POST);
    $id_persona = $_POST['id_persona'];
    $nro_identidad = $_POST['nro_identidad'];
    $razon_social = $_POST['razon_social'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $distrito = $_POST['distrito'];
    $cod_postal = $_POST['cod_postal'];
    $direccion = $_POST['direccion'];
    $rol = $_POST['rol'];

    if ($id_persona == "" || $nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == ""  || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == "" || $rol == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, campos vacios');
    } else {
        $existeID = $objPersona->ver($id_persona);
        if (!$existeID) {
            $arrResponse = array('status' => false, 'msg' => 'Error, usario no existe');
            echo json_encode($arrResponse);
            exit;
        } else {
            $actualizar = $objPersona->actualizar($id_persona, $nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol);
            if ($actualizar) {
                $arrResponse = array('status' => true, 'msg' => "actualizado correctamente");
            } else {
                $arrResponse = array('status' => false, 'msg' => $actualizar);
            }
            echo json_encode($arrResponse);
            exit;
        }
    }
}

if ($tipo == "eliminar") {
    $id_persona = $_POST['id_persona'];
    if ($id_persona == "") {
        $arrResponse = array('status' => false, 'msg' => 'Error, id vacio');
    } else {
        $eliminar = $objPersona->eliminar($id_persona);
        if ($eliminar) {
            $arrResponse = array('status' => true, 'msg' => 'Usuario eliminado correctamente');
        } else {
            $arrResponse = array('status' => false, 'msg' => 'Error al eliminar usuario');
        }
        echo json_encode($arrResponse);
        exit;
    }
}

if ($tipo == "mostrar_clientes") {
    $usuarios = $objPersona->mostrarClientes();
    $respuesta = array();
    if (!empty($usuarios)) {
        $respuesta = array('status' => true, 'msg' => 'Clientes encontrados', 'data' => $usuarios);
    } else {
        $respuesta = array('status' => false, 'msg' => 'No hay clientes registrados', 'data' => array());
    }
    header('Content-Type: application/json');
    echo json_encode($respuesta);
    exit;
}

if ($tipo == "mostrar_proveedores") {
    $usuarios = $objPersona->mostrarProveedores();
    $respuesta = array();
    if (!empty($usuarios)) {
        $respuesta = array('status' => true, 'msg' => 'Proveedores encontrados', 'data' => $usuarios);
    } else {
        $respuesta = array('status' => false, 'msg' => 'No hay proveedores registrados', 'data' => array());
    }
    header('Content-Type: application/json');
    echo json_encode($respuesta);
}

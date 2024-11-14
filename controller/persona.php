<?php
require_once('../model/personaModel.php');

$tipo = $_REQUEST['tipo'];

$objpersona = new personaModel();
if ($tipo == "registrar") {
   
    
    if ($_POST)
    $nro_identidad = $_POST['nro_identidad'];
    $razon_social = $_POST['razon_social'];
    $telefo = $_POST['telefo'];
    $correo = $_POST['correo'];
    $departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $distrito = $_POST['distrito'];
    $cod_postal = ['cod_postal'];
    $direccion = $_POST['direccion'];
    $rol = $_POST['rol'];
    $password = $_POST['password'];
    $estado = $_POST['estado'];
    $fecha_reg = $_POST['fecha_reg'];

    $secure_password =password_hash($dni,PASSWORD_DEFAULT);
    
    if ($nro_identidad == "" || $razon_social == "" || $telefo == "" || $correo == "" || $departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" || $direccion == ""|| $rol == ""
    || $password== ""|| $estado == ""|| $fecha_reg == "") {
        $arr_Respuesta = array('status' => true, 'mensaje' => 'Error campos vacios');

    } else {
        $arrPersona = $objPersona->registrarPersona($nro_identidad, $razon_social, $telefo, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $password, 
        $estado, $fecha_reg );
        if ($arrPersona->id > 0) {
            $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso');
        //cargar archivos
        
        } else {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
        }
        echo json_encode($arr_Respuesta);
    }
}
if ($tipo == "listar") {
}
if ($tipo == "ver") {
}
if ($tipo == "actualizar") {
}

?>
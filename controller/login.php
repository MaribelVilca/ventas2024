<?php
require_once("../model/personaModel.php");

$objPersona = new personaModel();
$tipo = $_GET['tipo'];
if($tipo=='iniciar_sesion'){
    $usuario = trim($_POST['username']);
    $password = trim($_POST['password']);
    $arrResponse = array('status'=> false, 'msg'=>'');

    $arrPersona = $objPersona->buscarpersonaPorDNI($usuario);
    //print_r($arrPersona);//
    if (empty($arrPersona)){
        $arrResponse = array('status'=> false, 'msg'=>'Error,usuario no esta registradoen el sistema');

    }else{
        if (password_verify($password, $arrPersona->password)){
            session_start();
            $_SESSION['sesion_ventas_id'] = $arrPersona->id;
            $_SESSION['sesion_ventas_dni'] = $arrPersona->nro_identidad;
            $_SESSION['sesion_ventas_nombres'] = $arrPersona->$razon_social;
            $arrResponse = array('status'=> true, 'msg'=>'Ingresar ala sistema');

        }else{

            $arrResponse = array('status'=> false, 'msg'=>'Error,contraseña incorrecta');   
        }
        echo json_encode($arrResponse);
    }
    if ($tipo =="cerrar_sesion"){
        session_start();
        session_unset();
        session_destroy();
        $arrResponse = array('status'=> true);
        echo json_decode($arrPersona);
    }
}

die;
?>
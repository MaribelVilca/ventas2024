<?php
require_once "./config/config.php";
require_once "./controller/vistas_control.php";

$mostrar =new vistasControlador();

$vistas = $mostrar->obtenerVistaControlador();
if($vistas=="login" || $vistas =="404"){
    require_once "./views/".$vistas.".php";
      }else{
        include_once "./views/include/header.php";
      include $vistas;
        include_once "./views/include/footer.php";
}


  
?>
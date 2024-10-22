<?php
require_once('./model/productoModel.php');

$tipo = $_REQUEST['tipo'];
//instancia la clase modelo//
$objProducto= new ProductoModel();
if($tipo=="registar") {
    if($_POST)
$nombre =$_post['nombre'];
$detalle =$_post['detalle'];
$precio =$_post['precio'];
$Stock =$_post['stock'];
$categoria =$_post['categoria'];
$fecha =$_post['fecha'];
$imagen =$_post['imagen'];
$proveedor =$_post['proveedor'];

if($codigo=="" ||$nombre=="" ||$detalle=="" ||$precio=="" ||$Stock=="" ||$categoria=="" ||$fecha=="" ||$imagen=="" ||$proveedor==""){
$arr_Respuesta=array('status'=>false,'mensaje'=>'Error campos vacios');
}else{
 $arrProducto=
 $objProducto->registrarProducto
 ($codigo, $nombre, $detalle, $precio, $stock, $categoria, $fecha, $imagen, $proveedor);
}


    
}
if($tipo=="listar")

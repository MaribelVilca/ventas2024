<?php
require_once('../model/productoModel.php');

$tipo = $_REQUEST['tipo'];
//instancia la clase modelo//
$objProducto = new ProductoModel();
if ($tipo == "registrar") {
    if ($_POST)
        $codigo = $_POST['codigo'];
    $nombre = $_POST['Nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['Stock_Inicial'];
    $categoria = $_POST['categoria'];
    $fecha = $_POST['fecha_vencimiento'];
    $imagen = $_POST['imagen'];
    $proveedor = $_POST['proveedor'];

    if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $categoria == "" || $fecha == "" || $imagen == "" || $proveedor == "") {
        $arr_Respuesta = array('status' => false, 'mensaje' => 'Error campos vacios');
    } else {
        $arrProducto = $objProducto->registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $categoria, $fecha, $imagen, $proveedor);
        if ($arrProducto->id > 0) {
            $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso');
        } else {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
        }
        echo json_encode($arr_Respuesta);
    }
}
if ($tipo == "listar") {
}

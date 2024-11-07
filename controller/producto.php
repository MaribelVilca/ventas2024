<?php
require_once('../model/productoModel.php');

$tipo = $_REQUEST['tipo'];
//instancia la clase modelo//
$objProducto = new ProductoModel();
if ($tipo == "registrar") {
   // print_r($_POST);
    //echo $_FILES['imagen']['name'];

    $archivo = $_FILES['imagen']['tmp_name'];
    $destino = './assets/img_productos/';
    $tipoArchivo =strtolower(pathinfo($_FILES['imagen']['name'],PATHINFO_EXTENSION));
    
    if ($_POST)
        $codigo = $_POST['codigo'];
    $nombre = $_POST['Nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['Stock_Inicial'];
    $categoria = $_POST['categoria'];
    $fecha = $_POST['fecha_vencimiento'];
    $imagen = 'imagen';
    $proveedor = $_POST['proveedor'];

    if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $categoria == "" || $fecha == "" || $imagen == "" || $proveedor == "") {
        $arr_Respuesta = array('status' => true, 'mensaje' => 'Error campos vacios');

    } else {
        $arrProducto = $objProducto->registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $categoria, $fecha, $imagen, $proveedor);
        if ($arrProducto->id > 0) {
            $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso');
        //cargar archivos
            $archivo = $_FILES['imagen']['tmp_name'];
            $destino = './assets/img_productos/';
            $tipoArchivo =strtolower(pathinfo($_FILES['imagen']['name'],PATHINFO_EXTENSION));

            $nombre = $arrProducto->id.".".$tipoArchivo;

        if (move_uploaded_file($archivo,$destino.$nombre)){
          $arr_imagen = $objProducto->actualizar_imagen($arrProducto->id, $nombre);

        }else {
            $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso,error al subir imagen');
        }

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
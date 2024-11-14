<?php
require_once('../model/ComprasModel.php');

$tipo = $_REQUEST['tipo'];
$objCompras = new ComprasModel();

if ($tipo == "Registrar") {
    if ($_POST) {
        $id_proveedor = $_POST['id_proveedor'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $id_proveedor = $_POST['id_trabajador'];
        if (empty($id_proveedor) || empty($cantidad) || empty($precio) ||empty($id_trabajador) ) {
            echo json_encode(['status' => false, 'mensaje' => 'Error campos vacios.']);
            exit;
        }

        $resultado = $objCompras->registrarCompraS($id_proveedor, $cantidad, $precio,$id_trabajador);

        echo json_encode($resultado);
    } else {
        echo json_encode(['status' => false, 'mensaje' => 'No se recibieron datos.']);
    }
} else {
    echo json_encode(['status' => false, 'mensaje' => 'registro exitoso.']);
}
?>
<?php 
require_once "../library/conexion.php"; 
class ComprasModel {
    private $conexion;
    function __construct() {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    public function registrarCompra($id_proveedor, $cantidad, $precio, $id_trabajador) {
        $sql = $this->conexion->query("CALL insertCompra('{$id_proveedor}', '{$cantidad}', '{$precio}','{$id_trabajador}')");
        if ($sql) {
            return (object) [
                'status' => true,
                'mensaje' => 'Compra registrada exitosamente.'
        ];
        } else {
            return (object) [
                'status' => false,
                'mensaje' => 'Error al registrar la compra: ' . $this->conexion->error
            ];
        }
    }
}

?>
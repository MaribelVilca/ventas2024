<?php
require_once "../librerias/conexion.php";
class ProductoModel
{
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }

    
    public function obtener_productos(){
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM producto");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $categoria, $fecha, $imagen, $proveedor)
    {
        $sql = $this->conexion->query("CALL insertproducto('{$codigo}','{$nombre}','{$detalle}','{$precio}','{$stock}','{$categoria}','{$fecha}',
            '{$imagen}','{$proveedor}')");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function actualizar_imagen($id, $imagen){
    $sql = $this->conexion->query("UPDATE producto SET imagen='{$imagen}' WHERE id='{$id}'");
    }
    public function verProducto($id){
        $sql = $this->conexion->query("SELECT * FROM producto WHERE id='$id");
        $sql= $sql->fetch_object();
        return $sql;
    }
}
?>
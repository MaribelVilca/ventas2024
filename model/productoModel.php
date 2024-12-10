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
    public function registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $categoria, $fecha, $imagen, $proveedor)
    {
        $sql = $this->conexion->query("CALL insertproducto('{$codigo}','{$nombre}','{$detalle}','{$precio}','{$stock}','{$categoria}','{$fecha}',
            '{$imagen}','{$proveedor}')");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function actualizar_imagen($id, $imagen){
    $sql = $this->conexion->query("UPDATE producto SET imagen='{$imagen}' WHERE id='{$id}'");
    return 1;
    }
    public function obtener_productos(
   ){
          $arrRespuesta = array();
          $respuesta = $this->conexion->query("SELECT * FROM producto");

          while ($objeto = $respuesta->fetch_object()) {
               array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function obtener_productos_por_id($id)
    {
        $respuesta = $this->conexion->query("SELECT nombre FROM productos WHERE id = '($id)'");
        $objeto = $respuesta->fetch_object();
        return $objeto;
    }

    public function verProducto($id){
        $sql = $this->conexion->query("SELECT * FROM producto WHERE id='$id");
        $sql= $sql->fetch_object();
        return $sql;
    }

    
    public function actualizar_producto( $id, $nombre, $detalle, $precio,$categoria, $fecha_v,$proveedor) {
        $sql = $this->conexion->query("CALL actualizarproducto('{$id}',
        '{$nombre}','{$detalle}','{$precio}','{$categoria}',
        '{$fecha_v}','{$proveedor}')");
        $sql = $sql->fetch_object();
        return $sql;
    }

    public function eliminar_producto($id) {
    $this->conexion->begin_transaction();

    try {
        $sql_eliminar_compras = "DELETE FROM compras WHERE id_producto = ?";
        $query_compras = $this->conexion->prepare($sql_eliminar_compras);
        $query_compras->bind_param("i", $id);

        if (!$query_compras->execute()) {
            throw new Exception("Error al eliminar las compras asociadas.");
        }
        $sql = "DELETE FROM producto WHERE id = ?";
        $query = $this->conexion->prepare($sql);
        $query->bind_param("i", $id);

        if (!$query->execute()) {

            throw new Exception("Error al eliminar el producto.");
        }
 //confirmar la transaccion//
        $this->conexion->commit();
        //el producto se elimino correctamente//
        return true; 
    } catch (Exception $e) {
        $this->conexion->rollback();
        //retornar el mensaje del error//
        return $e->getMessage();
    }
}
    

}
?>
<?php
require_once "../librerias/conexion.php";
class ProductoModel{
    private $conexion;
    function__construct()
    {
        $this->conexion= new Conexion();
        $this->conexion =$this->conexion->connect();
    }
   
    public function registrarProducto()
        ($codigo, $nombre, $detalle, $precio, $stock, $categoria, $fecha, $imagen, $proveedor);{
            $sql = $this->conexion->query("CALL insertproducto('{$codigo}','{$nombre}','{$detalle}','{$precio}','{$stock}','{$categoria}','{$fecha}',
            '{$imagen}','{$proveedor}')");
        
        }
    }
    
        
?>
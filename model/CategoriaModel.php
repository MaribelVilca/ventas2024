<?php
require_once "../librerias/conexion.php";
class CategoriaModel
{
    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();
    }
    public function obtener_categoria()
    {
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM categoria");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }
    public function obtener_categoria_id($id){
        $Respuesta = $this->conexion->query("SELECT * FROM categoria WHERE id = '{$id}'");
        $objeto = $Respuesta->fetch_object();
        return $objeto;
    }
}
?>
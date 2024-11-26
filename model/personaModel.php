<?php
require_once "../librerias/conexion.php";
class personaModel
{


    private $conexion;
    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->connect();

    }
    public function obtener_personas(){
        $arrRespuesta = array();
        $respuesta = $this->conexion->query("SELECT * FROM persona");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
        }
        return $arrRespuesta;
    }

    public function registrarPersona($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $cod_postal, $direccion, $rol, $password, $estado, $fecha_reg,)
    {
        $sql = $this->conexion->query("CALL insertpersona('{$nro_identidad}','{$razon_social}','{$telefono}','{$correo}','{$departamento}','{$provincia}','{$cod_postal}',
            '{$direccion}','{$rol}','{$password}','{$estado}','{$fecha_reg}' )");
        $sql = $sql->fetch_object();
        return $sql;
    }
    public function buscarPersonaPorDNI($dni)
    {
        $sql = $this->conexion->query("SELECT *FROM persona WHERE nro_identidad='{$dni}'");
        $sql = $sql->fetch_object();

        return $sql;
    }
    public function obtener_trabajadores()
    {
        $arrRespuesta = array(); 
        $respuesta = $this->conexion->query("SELECT *FROM persona WHERE rol = 'trabajador");
        while ($objeto = $respuesta->fetch_object()) {
            array_push($arrRespuesta, $objeto);
    }
   return $arrRespuesta;

}
public function obtener_proveedores()
{
    $arrRespuesta = array(); 
    $respuesta = $this->conexion->query("SELECT *FROM persona WHERE rol = 'proveedor");
    while ($objeto = $respuesta->fetch_object()) {
        array_push($arrRespuesta, $objeto);
}
return $arrRespuesta;

}

}

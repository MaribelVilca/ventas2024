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
}

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
    public function buscarPersonaPorDNI($nro_identidad)
    {
        $sql = $this->conexion->query("SELECT *FROM persona WHERE nro_identidad='{$nro_identidad}'");
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
public function obtener_proveedores(){
    $arrRespuesta = array(); 
    $respuesta = $this->conexion->query("SELECT *FROM persona WHERE rol = 'proveedor");
    while ($objeto = $respuesta->fetch_object()) {
        array_push($arrRespuesta, $objeto);
}
return $arrRespuesta;

}
public function obtener_persona($id){ 
    $respuesta = $this->conexion->query("SELECT *FROM persona WHERE id = '{$id}'");
    $respuesta = $respuesta->fetch_object();
    return $respuesta;    
}
public function obtener_producto_por_id($id){ 
    $respuesta = $this->conexion->query("SELECT razon_social FROM persona WHERE id = '{$id}'");
    $objeto = $respuesta->fetch_object();
    return $objeto;    
}
public function obtener_trabajador_por_id($id){ 
    $respuesta = $this->conexion->query("SELECT razon_social FROM persona WHERE id = '{$id}'");
    return $respuesta->fetch_object();
      
}
public function verPersona($id) {
    $sql = $this->conexion->query("SELECT * FROM persona WHERE id='{$id}'");
    $sql = $sql->fetch_object();
    return $sql;
}
public function ActualizarPersona($id, $nro_identidad, $razon_social, $telefono, $correo,$departamento,$direccion,$rol) {
    $sql = $this->conexion->query("CALL ActualizarPersona('{$id}',
    '{$nro_identidad}','{$razon_social}','{$telefono}','{$correo}','{$departamento}','{$direccion}','{$rol}'
    )");
    $sql = $sql->fetch_object();
    return $sql;
}
public function eliminar_persona( $id) {
    $sql = $this->conexion->query("CALL eliminarpersona('{$id}')");
    $sql = $sql->fetch_object();
    return $sql;
}
}
?>

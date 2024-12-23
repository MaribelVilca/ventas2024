<?php
require_once('../model/personaModel.php');



$tipo = $_REQUEST['tipo'];


$objpersona = new personaModel();

if ($tipo =="listar"){
    $arr_Respuesta =array('status'=>false, 'contenido'=>'');
    $arr_persona = $objpersona->obtener_personas();
    if (!empty($arr_persona)){
       
        for($i=0;$i < count($arr_persona); $i++){
            $id_persona = $arr_persona[$i]->id;
            $razon_social = $arr_persona[$i]->razon_social;
           
           
            $opciones = '<a href="'.BASE_URL.'editar producto/'.$id_persona.'">Editar</a><buntton onclick="eliminar_producto('.$id_persona.');">Eliminar</button>';
            $arr_persona[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_persona;
        
    }
    echo json_encode($arr_Respuesta);  
}

if ($tipo == "Registrar") {
   
    if ($_POST)
    $nro_identidad = $_POST['nro_identidad'];
    $razon_social = $_POST['razon_social'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $departamento = $_POST['departamento'];
    $provincia = $_POST['provincia'];
    $distrito = $_POST['distrito'];
    $cod_postal = ['cod_postal'];
    $direccion = $_POST['direccion'];
    $rol = $_POST['rol'];
    
    $secure_password =password_hash($nro_identidad,PASSWORD_DEFAULT);

    if ($nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" ||$departamento == "" || $provincia == "" || $distrito == "" || $cod_postal == "" ||
    $direccion == "" || $rol == "" || $secure_password == "") {
        $arr_Respuesta = array('status' => true, 'mensaje' => 'Error campos vacios');

    } else {
        $arrPersona = $objpersona->RegistrarPersona($nro_identidad, $razon_social, $telefono, $correo, $departamento, $provincia, $distrito, $cod_postal, $direccion, $rol, $secure_password);
        if ($objpersona->$id > 0) {
            $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso');
        //cargar archivos
        
        } else {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
        }
        echo json_encode($arr_Respuesta);
    }
}
if ($tipo == "listar_proveedor") {
    $arr_Respuesta = array('status' => false, 'contenido'=> '');
    $arr_proveedor = $objPersona->obtener_proveedores();
    if (!empty($arr_proveedor)) {

      for($i=0;$i < count($arr_proveedor); $i++){
            $id_categoria = $arr_Proveedor[$i]->id;
            $categoria = $arr_Proveedor[$i]->razon_social;
            $opciones = '';
            $arr_Proveedor[$i]->options = $opciones;
          }
          $arr_Respuesta['status'] = true;
          $arr_Respuesta['contenido'] = $arr_Proveedor;
        }
      
        echo json_encode($arr_Respuesta);
      }
        
      if ($tipo == "listar_trabajador") {
        $arr_Respuesta = array('status' => false, 'contenido'=> '');
        $arr_trabajador = $objPersona->obtener_trabajadores();
        if (!empty($arr_trabajador)) {
    
          for($i=0;$i < count($arr_trabajador); $i++){
                $id_trabajador = $arr_trabajador[$i]->id;
                $razon_social = $arr_trabajador[$i]->razon_social;
                $opciones = '';
                $arr_trabajador[$i]->options = $opciones;
              }
              $arr_Respuesta['status'] = true;
              $arr_Respuesta['contenido'] = $arr_trabajador;
            }
          
            echo json_encode($arr_Respuesta);
          }
    
if ($tipo == "ver") {
 // print_r($_POST);
$id_persona = $_POST['id_persona'];
$arr_Respuesta = $objPersona->verPersona($id_producto);
// print_r($arr_Respuesta);eso es para hacer la prueba 
if(empty($arr_Respuesta)){
  $response = array('status' => false, 'mensaje' =>"Error, No hay informacion");
}else{
  $response = array('status' => true, 'mensaje' => "Datos Encontrados", 'contenido' =>$arr_Respuesta);
}
echo json_encode($response);
}
if ($tipo == "actualizar") {
  if ($_POST) {
  $id = $_POST['id_persona'];
  $nro_identidad = $_POST['nro_identidad'];
  $razon_social = $_POST['razon_social'];
  $telefono = $_POST['telefono'];
  $correo = $_POST['correo'];
  $departamento = $_POST['departamento'];
  $direccion = $_POST['direccion'];
  $rol = $_POST['rol'];

  if ($nro_identidad == "" || $razon_social == "" || $telefono == "" || $correo == "" || $departamento == "" || $direccion == "" || $rol == "") {
      $arr_Respuesta = array(
          'status' => false,
          'mensaje' => 'Error, campos vacíos'
      );
  } else {
      $arr_Persona = $objPersona->Actualizarpersona($id, $nro_identidad, $razon_social, $telefono, $correo,$departamento,$direccion,$rol);

      if ($arr_Persona->p_id > 0) { 
          $arr_Respuesta = array(
              'status' => true,
              'mensaje' => 'Actualizado Correctamente'
          );
      
      } else {
          $arr_Respuesta = array(
              'status' => false,
              'mensaje' => 'Error al Actualizar Persona'
          );
      }
  }
  echo json_encode($arr_Respuesta);
}
}

if ($tipo=="eliminar") {
  $id_persona = $_POST['id_persona'];
  $arrpersona = $odjpersona->eliminar_persona($id_persona);
  if (empty($arr_Respuesta)) {
      $response = array('status' => false);
  }else {
      $response = array('status' => true);
  }
  echo json_decode($arr_Respuesta);
}


?>
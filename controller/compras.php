<?php
require_once('../model/comprasModel.php');
require_once('../model/personaModel.php');
require_once('../model/productoModel.php');

$tipo = $_REQUEST['tipo'];
$objProducto = new comprasModel();
$objcategoria = new personaModel();
$objcategoria = new productoModel();

if ($tipo == 'registrar') {

    if ($_POST) {
        $id_producto = $_POST['id_producto'];
        $cantidad = $_POST['cantidad'];
        $precio = $_POST['precio'];
        $trabajador = $_POST['id_trabajador'];
        if ($id_producto == "" || $cantidad == "" || $precio == "" || $id_trabajador == "") {
        
            $arr_Respuesta = array('status'=>false,'mensaje'=>'Error, campos vacíos');
        }else{
           
            $arrProducto= $objCompras->Registrarcompras(
                $id_producto, $cantidad, $precio, $trabajador);

            if ($arrProducto->id>0) {
                $arr_Respuesta = array('status'=>true,'mensaje'=>'Registro exitoso.');

            }else{
                $arr_Respuesta = array('status'=>false,'mensaje'=>'Error al registrar producto.');
            }
            echo json_encode($arr_Respuesta);
        }

    }
}


if ($tipo =="listar"){
    $arr_Respuesta =array('status'=>false, 'contenido'=>'');
    $arr_compras = $objcompras->obtener_compras();
    if (!empty($arr_compras)){
    
        for($i=0;$i < count($arr_compras); $i++){
            $id_producto = $arr_compras[$i]->id_producto;
            $r_producto = $objProducto->obtener_productos($id_producto);
            $arr_Compras[$i]->producto=$r_producto; 
            
        

           $id_trabajador = $arr_Compras[$i]->$id_persona;
            $r_trabajador = $objPersona->obtener_personas($id_producto);
            $arr_Compras[$i]->$r_trabajador=$r_trabajador; 
            $idCompra = $arr_Compras[$i]->id;
           
            $opciones = '<a href="'.BASE_URL.'editar-compra/'.$id_compras.'">Editar</a><buntton onclick="eliminar_producto('.$id_compras.');">Eliminar</button >';
            $arr_compras[$i]->options = $opciones;

    }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_compras;
        
    }
    echo json_encode($arr_Respuesta);  
}

if ($tipo == "actualizar") {
    if ($_POST) {
    $id = $_POST['id_compra'];
    $id_producto = $_POST['id_producto'];
    $cantidad = $_POST['cantidad'];
    $precio = $_POST['precio'];
    $id_trabajador = $_POST['id_trabajador'];

    if ($id_producto == "" || $cantidad == "" || $precio == "" || $id_trabajador == "") {
        $arr_Respuesta = array(
            'status' => false,
            'mensaje' => 'Error, campos vacíos'
        );
    } else {
        $arr_Compras = $objCompras->Actualizarcompras($id, $id_producto, $cantidad, $precio, $id_trabajador);

        if ($arr_Compras->p_id > 0) { 
            $arr_Respuesta = array( 'status' => true,'mensaje' => 'Actualizado Correctamente'
            );
        
        } else {
            $arr_Respuesta = array(  'status' => false,  'mensaje' => 'Error al Actualizar Compra'
            );
        }
    }
    echo json_encode($arr_Respuesta);
}
}
if ($tipo == "ver") {
    // print_r($_POST);
   $id_compras = $_POST['id_compras'];
   $arr_Respuesta = $objcompras->ver_compra($id_compras);
   // print_r($arr_Respuesta);eso es para hacer la prueba 
   if(empty($arr_Respuesta)){
     $response = array('status' => false, 'mensaje' =>"Error, No hay informacion");
   }else{
     $response = array('status' => true, 'mensaje' => "Datos Encontrados", 'contenido' =>$arr_Respuesta);
   }
   echo json_encode($response);
   }
   if ($tipo=="eliminar") {
    $id_compras= $_POST['id_compras'];
    $arrcompras = $odjcompras->eliminar_compras($id_compras);
    if (empty($arr_Respuesta)) {
        $response = array('status' => false);
    }else {
        $response = array('status' => true);
    }
    echo json_decode($arr_Respuesta);
}


?>
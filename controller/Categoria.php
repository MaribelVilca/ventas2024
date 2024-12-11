<?php
require_once('../model/CategoriaModel.php');

//instanciar la clase categoria modelo//


$tipo = $_REQUEST['tipo'];
$objCategoria = new CategoriaModel();

if ($tipo == "listar"){

    $arr_Respuesta =array('status'=>false, 'contenido'=>'');
    $arr_Categorias = $objCategoria->obtener_categorias();
    if (!empty($arr_Categorias)){
        
        for($i = 0; $i < count($arr_Categorias); $i++){
            $id_categoria = $arr_Categorias[$i]->id;
            $categoria = $arr_Categorias[$i]->nombre;
            $opciones = '<a href="'.BASE_URL.'editar producto/'.$id_categoria.'">Editar</a><buntton onclick="eliminar_producto('.$id_categoria.');">Eliminar</button>';
            $arr_Categorias[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Categorias;
        
    }
    echo json_encode($arr_Respuesta);  
}
if ($tipo =="registrar"){
    if ($_POST){
        $nombre = $_POST['nombre'];
        $detalle = $_POST['detalle'];
        if($nombre == "" || $detalle == ""){
            $arr_Respuesta= array('status'=>false,
            'mensaje'=> 'Error, campos vacios'
        );
    }else{
        $arr_Categoria = $objCategoria -> RegistrarCategoria($nombre,$detalle);
        if ($arr_Categoria->id > 0){
            $arr_Respuesta = array('status' =>true,
            'mensaje' => 'Registro exitoso'
        );
    }else{
        $arr_Respuesta = array(
            'status'=> false,
            'mensaje' =>'error al registrar producto'
        );
      }
      echo json_encode($response);
    }
  }
  if ($tipo == "ver") {
    // print_r($_POST);
   $id_categoria = $_POST['id_categoria'];
   $arr_Respuesta = $objcompras->ver_categoria($id_categoria);
   // print_r($arr_Respuesta);eso es para hacer la prueba 
   if(empty($arr_Respuesta)){
     $response = array('status' => false, 'mensaje' =>"Error, No hay informacion");
   }else{
     $response = array('status' => true, 'mensaje' => "Datos Encontrados", 'contenido' =>$arr_Respuesta);
   }
   echo json_encode($response);
        
}
    
}
    if ($tipo == "actualizar"){
        if ($_POST){
        $id = $_POST['id_categoria'];
        $id = $_POST['nombre'];
        $id = $_POST['detalle'];
        if ($nombre == "" || $detalle ==""){
            $arr_Respuesta = array(
                'status' => false,'mensaje' => 'Error, campos vacíos');
        }else{
           $arr_Categoria = $objCategoria-> ActulizarCategoria($id, $nombre, $detalle);
           if ($arrCategoria-> p_id > 0) {
            $arr_Respuesta = array('status' => true,'mensaje' => 'Actualizado Correctamente');
           }else{
             $arr_Respuesta = array('status' => false,'mensaje' => 'Error al Actualizar Producto');

           }
           }
           echo json_encode($arr_Respuesta);
        }

  }



    

?>
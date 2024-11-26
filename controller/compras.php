<?php
require_once('../model/ComprasModel.php');
require_once('../model/productoModel.php');
require_once('../model/personaModel.php');

$objProducto = new comprasModel();
$objcategoria = new productoModel();
$objPersona = new PersonaModel();


$tipo = $_REQUEST['tipo'];


if ($tipo == "listar") {
   
        $arr_Respuesta =array('status'=>false, 'contenido'=>'');
        $arr_persona = $objPersona->obtener_compras();
        if (!empty($arr_compras)){
           
            for($i=0;$i < count($arr_compras); $i++){
                $id_producto = $arr_compras[$i]->id_producto;
                $arr_producto = $objProducto->obtener_producto_id($id_producto);
                $arr_compras[$i]->producto = $arr_producto;
                
              
                    $id_producto = $arr_compras[$i]->id_producto;
                    $arr_producto = $objProducto->obtener_trabajador_id($id_producto);
                    $arr_compras[$i]->producto = $arr_producto;
                    $id_compras = $arr_compras[$i]->id;
                    $opciones = '<button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button>
                                 <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                    $arr_compras[$i]->options = $opciones;
               } 
                      
           $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_compras;

      }
    echo json_encode($arr_Respuesta);  
}
?>
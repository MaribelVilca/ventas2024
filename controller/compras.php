<?php
require_once('../model/ComprasModel.php');
require_once('../model/productoModel.php');


$objProducto = new comprasModel();
$objcategoria = new productoModel();



$tipo = $_REQUEST['tipo'];


if ($tipo =="listar"){
    $arr_Respuesta =array('status'=>false, 'contenido'=>'');
    $arr_compras = $objcompras->obtener_compras();
    if (!empty($arr_compras)){
    
        for($i=0;$i < count($arr_productos); $i++){
            $id_producto = $arr_compras[$i]->id_producto;
            $r_producto = $objProducto->obtener_producto_id($id_producto);
            $arr_compras[$i]->producto=$r_producto; 
            
            
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_productos;
        
    }
    echo json_encode($arr_Respuesta);  
}



?>
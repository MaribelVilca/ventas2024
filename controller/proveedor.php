<?php
require_once('../model/proveedorModel.php');

//instanciar la clase categoria modelo//
$objproveedor = new proveedorModel();

$tipo = $_REQUEST['tipo'];

if ($tipo == "listar"){

    $arr_Respuesta =array('status'=>false, 'contenido'=>'');
    $arr_proveedor = $objproveedor->obtener_proveedor();
    if (!empty($arr_proveedor)){
        //recorremos el array para agregar las opciones de las catagorias//
        for($i=0;$i < count($arr_proveedor); $i++){
            $id_persona =$arr_proveedor[$i]->id;
            $id_persona = $arr_proveedor[$i]->razon_social;
            $opciones = '';
            $arr_proveedor[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_proveedor;
        
    }
    echo json_encode($arr_Respuesta);
    
}
?>
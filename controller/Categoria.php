<?php
require_once('../model/CategoriaModel.php');

//instanciar la clase categoria modelo//
$objCategoria = new CategoriaModel();

$tipo = $_REQUEST['tipo'];

if ($tipo == "listar"){

    $arr_Respuesta =array('status'=>false, 'contenido'=>'');
    $arr_Categorias = $objCategoria->obtener_categoria();
    if (!empty($arr_Categorias)){
        //recorremos el array para agregar las opciones de las catagorias//
        for($i=0;$i < count($arr_Categorias); $i++){
            $id_categoria =$arr_Categorias[$i]->id;
            $id_categoria = $arr_Categorias[$i]->nombre;
            $opciones = '';
            $arr_Categorias[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_Categorias;
        
    }
    echo json_encode($arr_Respuesta);  
}
?>
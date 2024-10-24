<?php
require_once('../model/CategoriaModel.php');
$tipo = $_REQUEST['tipo'];
//instanciar la clase categoria modelo//
$objCategoria = new CategoriaModel();
if ($_tipo=="listar"){

    $arr_Respuesta =array('status'=>false, 'contenido'=>'');
    $arr_Categorias = $objCategoria->obtener_Categoria();

    print_r($arr_Categorias);
}

?>
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
            $arr_Categorias = $objCategoria->registrar_Categoria($nombre,$detalle);

        }    
        
    }
    

    }

?>
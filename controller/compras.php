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
        $id_trabajador = $_POST['id_trabajador'];
        if ($id_producto == "" || $cantidad == "" || $precio == "" || $id_trabajador == "") {
        
            $arr_Respuesta = array('status'=>false,'mensaje'=>'Error, campos vacíos');
        }else{
           
            $arrCompra = $objCompra->registrarcompras(
                $id_producto, $cantidad, $precio, $id_trabajador);

            if ($arrCompra->id>0) {
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
            $arr_compras[$i]->producto=$r_producto; 
            
        

           $id_persona = $arr_compras[$i]->$id_persona;
            $r_persona = $objPersona->obtener_personas($id_producto);
            $arr_compras[$i]->persona=$r_persona; 
            $id_compras = $arr_compras[$i]->persona=$r_persona;
            $idCompra = $arr_Compras[$i]->id;
           
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
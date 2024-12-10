<?php
require_once('../model/productoModel.php');
require_once('../model/categoriaModel.php');
require_once('../model/personaModel.php');
//instancia la clase modelo//
$tipo = $_REQUEST['tipo'];
$objProducto = new ProductoModel();
$objcategoria = new CategoriaModel();
$objPersona = new PersonaModel();


if ($tipo =="listar"){
    $arr_Respuesta =array('status'=>false, 'contenido'=>'');
    $arr_productos = $objProducto->obtener_productos();
    if (!empty($arr_productos)){
       //recordemos el array para agregar las opciones de//
        for($i=0;$i < count($arr_productos); $i++){
            $id_categoria = $arr_productos[$i]->id_categoria;
            $r_categoria = $objcategoria->obtener_categoria_id($id_categoria);
            $arr_productos[$i]->categoria=$r_categoria; 
            
            $id_producto =$arr_productos[$i]->id;
            $id_producto = $arr_productos[$i]->nombre;
      
            $opciones = '<a href=" ' . BASE_URL . 'editar-producto/' . $id_producto . '"><button class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></button></a>
<button class="btn btn-danger btn-sm" onclick="eliminar_producto(' . $id_producto . ');"><i class="fas fa-trash-alt"></i>
</button>';
            $arr_productos[$i]->options = $opciones;
        }
        $arr_Respuesta['status'] = true;
        $arr_Respuesta['contenido'] = $arr_productos;
        
    }
    echo json_encode($arr_Respuesta);  
}


if ($tipo == "registrar") {
   // print_r($_POST);
    //echo $_FILES['imagen']['name'];

    $archivo = $_FILES['imagen']['tmp_name'];
    $destino = './assets/img_productos/';
    $tipoArchivo =strtolower(pathinfo($_FILES['imagen']['name'],PATHINFO_EXTENSION));
    
    if ($_POST)
     $codigo = $_POST['codigo'];
    $nombre = $_POST['Nombre'];
    $detalle = $_POST['detalle'];
    $precio = $_POST['precio'];
    $stock = $_POST['Stock_Inicial'];
    $categoria = $_POST['categoria'];
    $fecha = $_POST['fecha_vencimiento'];
    $imagen = 'imagen';
    $proveedor = $_POST['proveedor'];

    if ($codigo == "" || $nombre == "" || $detalle == "" || $precio == "" || $stock == "" || $categoria == "" || $fecha == "" || $imagen == "" || $proveedor == "") {
        $arr_Respuesta = array('status' => true, 'mensaje' => 'Error campos vacios');

    } else {

//cargar archivos
           $archivo = $_FILES['imagen']['tmp_name'];
           $destino = '../assets/img_productos/';
           $tipoArchivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));
           

        $arrProducto = $objProducto->registrarProducto($codigo, $nombre, $detalle, $precio, $stock, $categoria, $fecha, $imagen, $proveedor);
        if ($arrProducto->id_n> 0) {
            $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso');
            $nombre = $arrProducto->id_n.".".$tipoArchivo;
       
            if (move_uploaded_file($archivo, $destino . '' . $nombre)) {
            } else {
                $arr_Respuesta = array('status' => true, 'mensaje' => 'Registro Exitoso, error al subir imagen');
            }
    
        
        } else {
            $arr_Respuesta = array('status' => false, 'mensaje' => 'Error al registrar producto');
        }
        echo json_encode($arr_Respuesta);
    }

  if ($tipo == "ver") {
    $id_producto = $_POST['id_producto'];
    $arr_Respuesta = $objProducto->verProducto($id_producto);
    //print_r($arr_Respuesta);
    if (empty($arr_Respuesta)){
        $arr_response = array('status'=> false,'mensaje'=>"Error,No hay informacion");
    }else{
        $arr_response = array('status'=> false,'mensaje'=>"datos encontrados",
        'contenido'=> $arr_Respuesta); 
    }
    echo json_encode($arr_response); 
    }
   
  }
  if ($tipo == "actualizar") {
    if ($_POST) {
        $id = $_POST['id_producto'];
        $imagen = $_POST['img']; // Imagen anterior
        $nombre = $_POST['nombre'];
        $detalle = $_POST['detalle'];
        $precio = $_POST['precio'];
        $categoria = $_POST['categoria'];
        $fecha_v = $_POST['fecha_v'];
        $proveedor = $_POST['proveedor'];
  
        if ($nombre == "" || $detalle == "" || $precio == "" || $categoria == "" || $fecha_v == "" || $proveedor == "") {
            $arr_Respuesta = array(
                'status' => false,
                'mensaje' => 'Error, campos vacíos'
            );
        } else {
            $arrProducto = $objProducto->actualizar_producto($id, $nombre, $detalle, $precio, $categoria, $fecha_v, $proveedor);
  
            if ($arrProducto->p_id > 0) { // Producto actualizado correctamente//
                $arr_Respuesta = array(
                    'status' => true,
                    'mensaje' => 'Actualizado Correctamente'
                );
  
                if ($_FILES['imagen']['tmp_name'] != "") {
                    $rutaBase = '../assets/img_productos/';
                    
                    // Eliminar todas las imágenes anteriores asociadas al producto//
                    $archivos = glob($rutaBase . $id . '.*'); // Buscar archivos con el mismo nombre base//
                    foreach ($archivos as $archivo) {
                        if (is_file($archivo)) {
                            unlink($archivo); // Eliminar archivo//
                        }
                    }
  
                    // Subir nueva imagen//
                    $archivo = $_FILES['imagen']['tmp_name'];
                    $tipoArchivo = strtolower(pathinfo($_FILES["imagen"]["name"], PATHINFO_EXTENSION));
                    $destino = $rutaBase . $id . '.' . $tipoArchivo;
  
                    // Validar tipos de archivo permitidos//
                    $tiposPermitidos = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
                    if (in_array($tipoArchivo, $tiposPermitidos)) {
                        if (move_uploaded_file($archivo, $destino)) {
                            error_log("Imagen actualizada correctamente: $destino");
                        } else {
                            error_log("Error: No se pudo subir la imagen: $destino");
                        }
                    } else {
                        error_log("Error: Tipo de archivo no permitido: $tipoArchivo");
                    }
                }
            } else {
                $arr_Respuesta = array(
                    'status' => false,
                    'mensaje' => 'Error al Actualizar Producto'
                );
            }
        }
        echo json_encode($arr_Respuesta);
    }
  }
  
  if ($tipo == "eliminar") {
    if ($_POST) {
        $id = $_POST['id_producto'];
        $imagen = $_POST['img']; // Imagen asociada al producto
  
        if (empty($id)) {
            $arr_Respuesta = array(
                'status' => false,
                'mensaje' => 'Error, el ID del producto es requerido'
            );
        } else {
            $idEliminado = $objProducto->eliminar_producto($id);
  
            if ($idEliminado) {
                // Eliminar la imagen asociada si la ruta es válida
                $rutaImagen = $_SERVER['DOCUMENT_ROOT'] . '../assets/img_productos/' . $imagen; 
  
                if (!empty($imagen) && file_exists($rutaImagen)) {
                    if (unlink($rutaImagen)) {
                        $arr_Respuesta = array(
                            'status' => true,
                            'mensaje' => 'Producto y su imagen eliminados correctamente'
                        );
                    } else {
                        $arr_Respuesta = array(
                            'status' => true,
                            'mensaje' => 'Producto eliminado correctamente, pero no se pudo eliminar la imagen. Verifique los permisos.'
                        );
                    }
                } else {
                    $arr_Respuesta = array(
                        'status' => true,
                        'mensaje' => 'Producto eliminado correctamente, sin imagen asociada o imagen no encontrada'
                    );
                }
            } else {
                // Error al eliminar en la base de datos
                $arr_Respuesta = array(
                    'status' => false,
                    'mensaje' => 'Error al eliminar el producto en la base de datos'
                );
            }
        }
        echo json_encode($arr_Respuesta);
    }
  }
  
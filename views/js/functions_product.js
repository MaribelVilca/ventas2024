async function registrar_producto(){
    let codigo = document.getElementById('codigo').value;
    let nombre= document.querySelector('#nombre').value;
    let detalle= document.querySelector('#detalle').value;
    let precio= document.querySelector('#precio').value;
    let categoria = document.querySelector('#categoria').value;
    let fechaVencimiento = document.querySelector('#fecha_vencimiento').value;
    let imagen = document.querySelector('#imagen').value;
    let proveedor = document.querySelector('#proveedor').value;
    if(codigo==""|| nombre ==""||detalle==""|| precio==""|| categoria==""|| fechaVencimiento==""|| imagen==""|| proveedor==""){
        alert("error,campos vacios");
        return;

    }
   try{
    //capturamos datos del formulario html//
    const datos = new FormData(frmRegistrar);
    //enviar datos hacia el controlador//
    let respuesta = await fetch(base_url + 'controller/producto.php?tipo=registrar', {
        method: 'POST',
        moder: 'cors',
        cache: 'no-cache',
        body: datos
    });
    json = await respuesta.json();
    if(json.status){
    swal("Registro", json.mensaje,"success");
    }else{
        swal("Registro", json.mensaje,"error");   
    }

    console.log(json);
   } catch (e){
    console.log("Oops, ocurrio un error:" + e);

    
   }
}


async function listar_categorias() {
    try{
        let respuesta = await fetch(base_url +'controller/Categoria.php?tipo=listar');
        console.log(respuesta);
       json = await respuesta.json();
       if(json.status){
        let datos = json.contenido;
        datos.forEach(element => {
            $('#categoria').append($('<option />'),{
                text: `${element.nombre}`,
                value:  `${element.id}`,

            });
        });
       }
     console.log(respuesta);
    }catch (e) {
        console.log("Error al cargar categorias"+e);
    }
}
  

 
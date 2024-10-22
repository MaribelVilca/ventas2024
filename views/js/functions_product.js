async function registrar_producto(params){
    let codigo = document.getElementById('#Codigo').value;
    let nombre= document.querySelector('#Nombre').value;
    let detalle= document.querySelector('#Detalle').value;
    let precio= document.querySelector('#Precio').value;
    let Categoria = document.querySelector('#Categoria').value;
    let FechaVencimiento = document.querySelector('#Fecha-V').value;
    let Imagen = document.querySelector('#Imagen').value;
    let Proveedor = document.querySelector('#Proveedor').value;
    if(codigo==""|| nombre ==""||detalle==""|| precio==""|| Categoria==""|| FechaVencimiento==""|| Imagen==""|| Proveedor==""){
        alert("error,campos vacios");
        return;

    }
   try{
    //capturamos datos del formulario html//
    const datos = new FormData(frmRegistrar);
    //enviar datos hacia el controlador//
    let respuesta = await fetch(base-url+'controller/producto.php?tipo=registrar',{
        method: 'POST',
        moder: 'cors',
        cache: 'no-cache',
        body: datos
    });
    console.log(respuesta);
   } catch (e){
    console.log("Oops, ocurrio un error"+e);

    
   }
    
}
 
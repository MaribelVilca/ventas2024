async function listar_productos() {
   try{
     let respuesta = await fetch(base_url+'controller/producto.php?tipo=listar');
     json = await respuesta.json();
     if (json.status){
        let datos = json.contenido;
        let cont  = 0;
        datos.forEach(item =>{
            let nueva_fila = document.createElement("tr");
            //id de la fila y id de base de datos//
            nueva_fila.id = "fila"+item.id;
            cont+=1;
            nueva_fila.innerHTML = `
                  
                   <th>${cont}</th>
                   <td>${item.codigo}</td>
                   <td>${item.nombre}</td>
                   <td>${item.stock}</td>
                   <td>${item.categoria.nombre}</td>
                   <td>${item.id_proveedor}</td>
                   <td>${item.options}</td>
                  
            `;
            document.querySelector('#tbl_productos').appendChild(nueva_fila);
        });

       
     }
     console.log(json);
   }catch(error){
       console.log("Oops salio un error" + error);
   } 
}
if (document.querySelector('#tbl_productos')){
listar_productos();

}

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
        mode: 'cors',
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
   } catch (error){
    console.log("Oops, ocurrio un error:" + error);

    
   }
}


async function listar_categorias() {
    try{
        let respuesta = await fetch(base_url +'controller/Categoria.php?tipo=listar');
        console.log(respuesta);
       json = await respuesta.json();
       if(json.status){
        let datos = json.contenido;
        let contenido_select = '<option value="">Seleccione</option>';
        datos.forEach(element => {
            contenido_select += '<option value="' + element.id +'">' + element.nombre + '</option>';
           /* $('#categoria').append($('<option />',{
                text: `${element.nombre}`,
                value:  `${element.id}`,

            }));*/
        });
        document.getElementById('categoria').innerHTML = contenido_select;
    }
     console.log(respuesta);
    }catch (e) {
        console.log("Error al cargar categorias" + e);
    }
}

async function listar_proveedor() {
    try{
        let respuesta = await fetch(base_url +'controller/proveedor.php?tipo=listar');
        console.log(respuesta);
       json = await respuesta.json();
       if(json.status){
        let datos = json.contenido;
        let contenido_select = '<option value="">Seleccione</option>';
        datos.forEach(element => {
            contenido_select += '<option value="' + element.id +'">' + element.razon_social + '</option>';
           
        });
        document.getElementById('proveedor').innerHTML = contenido_select;
    }
     console.log(respuesta);
    }catch (e) {
        console.log("Error al cargar proveedor" + e);
    }
}
async function ver_producto(id){

    const formData = new FormData();
    formData.append('id_producto',id);
    try{
        let respuesta = await fetch(base_url+'controller/producto.php?tipo=ver',{
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: formData


        });
        json = await respuesta. json();
        if (json_status) {
            document.querySelector('#codigo').value = json.contenido.codigo;
            document.querySelector('#nombre').value = json.contenido.nombre;
            document.querySelector('#detalle').value = json.contenido.detalle;
            document.querySelector('#precio').value = json.contenido.precio;
            document.querySelector('#categoria').value = json.contenido.categoria;
            document.querySelector('#fecha_vencim').value = json.contenido.fecha_vencimiento;
            document.querySelector('#imagen').value = json.contenido.imagen;
            document.querySelector('#proveedor').value = json.contenido.proveedor;


        }else {
            window.location = base_url+"producto";
        }
        console.log(json);

    }catch (e) {
        console.log("oops ocurrio un error "+ e);
    }
    async function actualizar_producto(){
        const datos = new FormData();
        try {
        
            const datos = new FormData(formActualizar);
            let respuesta = await fetch(base_url + 'controller/Producto.php?tipo=actualizar', {
                method: 'POST',
                mode: 'cors',
                cache: 'no-cache',
                body: datos
            });
    json = await respuesta.json();
    console.log(json);
        } catch (e) {
             console.log("Oops, ocurrio un error" + e);
        }
    }
}


 async function eliminar_producto(id) {
    swal({
        title: "Realmente desea eliminar el producto",
        Text:'',
        icon: " warning",
        buttons: true,
        dangerMode: true
        }).then((willDelete)=>{
           if (willDelete) {
            fnt_eliminar(id);
           }
        })
 }
 async function fnt_eliminar(id) {
    const formdata = new FormData();
    formData.append('id_producto',id);
    try {
        let respuesta = await fetch
        (base_url + 'controller/producto.php?tipo=eliminar',{
            method: 'POST',
            mode: 'cors',
            cache: 'no_cache',
            body: formdata
        });
        json = await respuesta.json();
        if (json.status){
            swal("Eliminar","Eliminado correctamente","success");
            document.querySelector('#fila'+ id).remove();
        }else{
            swal ('Eliminar','Error al eliminar','warning');
        }

    }catch (e) {
        console.log("ocurrio error"+ e);

    }
    
 }
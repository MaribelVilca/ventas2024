async function listar_compras() {
    try{
      let respuesta = await fetch(base_url+'controller/compras.php?tipo=listar');
      json = await respuesta.json();
      if (json.status){
         let datos = json.contenido;
         let cont  = 0;
         datos.forEach(item =>{
             let nueva_fila = document.createElement("tr");
           
             nueva_fila.id = "fila"+item.id;
             cont += 1;
             nueva_fila.innerHTML = `
                  <tr>
                  <th>${cont}</th>
                  <td>${item.producto.nombre}</td>
                  <td>${item.cantidad}</td>
                  <td>${item.precio}</td>
                  <td>${item.trabajador,razon_social}</td>
                  <td>${item.options}</td>

                 </tr>
                  `;
                document.querySelector("#tbl_compra")
                .appendChild(nueva_fila);
                
            });
        };
        console.log(json);
    } catch (e) {
        console.error("Error al listar  compras" + e);
    }
}
if (document.querySelector('#tbl_compra')) {
    listar_compras();
}


async function registrarcompras() {
   
    let id_producto= document.querySelector('#id_producto').value;
    let cantidad = document.querySelector('#cantidad').value;
    let precio = document.querySelector('#precio').value;
    let trabajador = document.querySelector('#trabajador').value;
    
    if (id_producto== "" || cantidad == "" ||precio =="" ||trabajador=="") {
        alert("Error!!, Campos vacíos");
        return;
    }
    try{
        
        const datos = new FormData(formRegistrarCom);
      
        let respuesta = await fetch(base_url + 'controller/compras.php?tipo=Registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal("registro", json.mensaje, "success");
        } else {
            swal("Registro", json.mensaje, "error");
        }

        console.log(json);
    } catch (e) {
        console.log("Oops, ocurrio un error" + e)
    }
}
async function listar_productos() {
    try {
        // envia datos hacia el controlador//
        let respuesta = await fetch(base_url +
            'controller/producto.php?tipo=listar');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="">Seleccione</option>'
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id + '">' + element.nombre + '</option>';
               
            });
            document.getElementById('id_producto').innerHTML = contenido_select;
        }
        console.log(respuesta);
    } catch (e) {
        console.e("Error al cargar producto" + e)
    }
}
async function listar_trabajadores() {
    try {
        
        let respuesta = await fetch(base_url +
            'controller/persona.php?tipo=listar');
        json = await respuesta.json();
        if (json.status) {
            let datos = json.contenido;
            let contenido_select = '<option value="">Seleccione</option>'
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id + '">' + element.razon_social + '</option>';
               
            });
            document.getElementById('trabajador').innerHTML = contenido_select;
        }
        console.log(respuesta);
    } catch (e) {
        console.e("Error al cargar trabajador" + e)
    }
}
   async function ver_compra(id) {
    const formData = new FormData();
    formData.append('id_compra', id);
    try {
        let respuesta = await fetch(base_url + 'controller/compras.php?tipo=ver', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status){
            document.querySelector('#id_producto').value = json.contenido.id_producto;
            document.querySelector('#cantidad').value = json.contenido.cantidad;
            document.querySelector('#precio').value = json.contenido.precio;
            document.querySelector('#trabajador').value = json.contenido.id_trabajador;

        }else{
            window.location = base_url+"compras";
        }
        console.log(json);
    } catch (error) {
        console.log("Opps ocurrio un error" + error);
    }
}

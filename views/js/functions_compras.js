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
                  <td>${item.departamento}</td>

                 </tr>
                  `;
                document.querySelector("#tbl_compra")
                .appendChild(nueva_fila);
                
            });
        };
        console.log(json);
    } catch (error) {
        console.error("Error al listar  compras" + e);
    }
}
if (document.querySelector('#tbl_compra')) {
    listar_compras();
}


async function Registrar() {
   
    let id_producto= document.querySelector('#id_producto').value;
    let cantidad = document.querySelector('#cantidad').value;
    let precio = document.querySelector('#precio').value;
    let id_trabajador = document.querySelector('#id_trabajador').value;
    
    if (id_producto== "" || cantidad == "" ||precio =="" || id_trabajador=="") {
        alert("Error!!, Campos vacíos");
        return;
    }
    try{
        
        const datos = new FormData(frmRegistrar);
      
        let respuesta = await fetch(base_url + 'controller/compras.php?tipo=Registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if(json.status){

            document.querySelector('#codigo').value = json.contenido.codigo;
            document.querySelector('#id-producto').value = json.contenido.id_producto;
            document.querySelector('#cantidad').value = json.contenido.cantidad;
            document.querySelector('#precio').value = json.contenido.precio;
            document.querySelector('#trabajador').value = json.contenido.trabajador;

        }else {
            window.location = base_url+"compra";
        }
        console.log(json);

       } catch (error){
        console.log("Oops, ocurrio un error:" + e);
    
        
       }
    }
        
async function listar_categorias() {
    try{
      let respuesta = await fetch(base_url+'controller/categoria.php?tipo=listar');
      json = await respuesta.json();
      if (json.status){
         let datos = json.contenido;
         let cont  = 0;
         datos.forEach(item =>{
             let nueva_fila = document.createElement("tr");
             nueva_fila.id = "fila" + item.id;
             cont += 1;
             nueva_fila.innerHTML = `
                  
                  <th>${cont}</th>
                  <td>${item.nombre}</td>
                  <td>${item.detalle}</td>
                  <td>${item.options}</td>

                  `;
                document.querySelector("#tbl_categoria")
                .appendChild(nueva_fila);
                
              });
          };
        console.log(json);
      } catch (error) {
        console.error("Error al listar  categorias" + error);
      }
}
if (document.querySelector('#tbl_categoria')) {
    listar_categorias();
}

async function RegistrarCategoria(){
    let nombre= document.querySelector('#nombre').value;
    let detalle= document.querySelector('#detalle').value;
    if(nombre==""|| detalle ==""){
        alert("error,campos vacios");
        return;

    }
    try{
       
        const datos = new FormData(frmRegistrar);
     
        let respuesta = await fetch(base_url + 'controller/Categoria.php?tipo=Registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal("registro", json.mensaje, "success");
        } else {
            swal("registro", json.mensaje, "error");
        }
        console.log(json);

    } catch (e) {
        console.log("Oops, ocurrio un error" + e);
    }
}

    async function ver_categoria(id){
        const formData = new FormData();
        formData.append('id_categoria', id);
        try {
            let respuesta = await fetch(base_url+'controller/Categoria.php?tipo=ver',{
                method: 'POST',
                mode: 'cors',
                cache:'no-cache',
                body: formData
            });
           json = await respuesta.json();
           if(json.status){
            
            document.querySelector('#id_categoria').value = json.contenido.id;
            document.querySelector('#nombre').value = json.contenido.nombre;
            document.querySelector('#detalle').value = json.contenido.detalle;

        }else {
            window.location = base_url+"categorias";
        }
        console.log(json);
        }catch (e) {
            console.log("Opps ocurrio un error" + e);
        }
    }
    async function ActulizarCategoria(){
        const datos = new FormData();
        try {
            const datos = new FormData(formActualizarCategoria);
            let respuesta = await fetch(base_url+'controller/Categoria.php?tipo=Actualizar',{
                method: 'POST',
                mode: 'cors',
                cache:'no-cache',
                body: datos
            });
           json = await respuesta.json();
        console.log(json);
        }catch (e) {
            console.log("Opps ocurrio un error" + e);
        }
    }
    async function fnt_eliminar(id) {
        const formdata = new FormData();
        formData.append('id_categoria',id);
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
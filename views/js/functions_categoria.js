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

async function Registrar(){
    let nombre= document.getElementById('#nombre').value;
    let detalle= document.querySelector('#detalle').value;
    if(nombre==""|| detalle ==""){
        alert("error,campos vacios");
        return;

    }
    try{
       
        const datos = new FormData(frmRegistrar);
     
        let respuesta = await fetch(base_url + 'controller/categoria.php?tipo=Registrar', {
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
            
            document.querySelector('#id').value = json.contenido.id;
            document.querySelector('#nombre').value = json.contenido.nombre;
            document.querySelector('#detalle').value = json.contenido.detalle;

        }else {
            window.location = base_url+"compra";
        }
        console.log(json);
        }catch (e) {
            console.log("Error al cargar categorias" + e);
        }
    }
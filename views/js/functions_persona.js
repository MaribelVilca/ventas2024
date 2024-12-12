async function listar_persona() {
    try{
      let respuesta = await fetch(base_url+'controller/persona.php?tipo=listar');
      json = await respuesta.json();
      if (json.status){
         let datos = json.contenido;
         let cont  = 0;
         datos.forEach(item =>{
             let nueva_fila = document.createElement("tr");
             //id de la fila y id de base de datos//
             nueva_fila.id = "fila"+item.id;
             cont +=1;
             nueva_fila.innerHTML = `
                   <tr>
                    <th>${cont}</th>
                    <td>${item.nro_identidad}</td>
                    <td>${item.razon_social}</td>
                    <td>${item.telefono}</td>
                    <td>${item.correo}</td>
                    <td>${item.departamento}</td>
                    <td>${item.provincia}</td>
                    <td>${item.distrito}</td>
                    <td>${item.direccion}</td>
                    <td>${item.rol}</td>
                    <td>${item.fecha_reg}</td>
                    <td>${item.options}</td>
                   
                  </tr> 
             `;
             document.querySelector('#tbl_persona').appendChild(nueva_fila);
         });
 
        
      }
      console.log(json);
    }catch(e){
        console.log("Oops salio un error al listar persona" + e);
    } 
 }
 if (document.querySelector('#tbl_persona')){
 listar_persona();
 
 }
 


async function RegistrarPersona(){
    let nro_identidad = document.getElementById('nro_identidad').value;
    let razon_social= document.getElementById('razon_social').value;
    let telefono= document.getElementById('telefono').value;
    let correo= document.getElementById('correo').value;
    let departamento = document.getElementById('departamento').value;
    let provincia = document.getElementById('provincia').value;
    let distrito = document.getElementById('distrito').value;
    let cod_postal = document.getElementById('cod_postal').value;
    let direccion = document.getElementById('direccion').value;
    let rol = document.getElementById('rol').value;
    
    if (!nro_identidad || !razon_social || !telefono || !correo || !departamento || !provincia || !distrito || !cod_postal || !direccion || !rol ) {
        alert("Error, campos vacíos");
        return;
    }

    try {
        const datos = new FormData(frmRegistrar);

        let respuesta = await fetch(base_url + 'controller/persona.php?tipo=Registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
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
async function ver_persona(id) {
    const formData = new FormData();
    formData.append('id_persona', id);
    try {
        let respuesta = await fetch(base_url+'controller/persona.php?tipo=ver',{
            method: 'POST',
            mode: 'cors',
            cache:'no-cache',
            body: formData
        });
        json = await respuesta.json();
        if (json.status){
            document.querySelector('#codigo').value = json.contenido.codigo;
            document.querySelector('#nro_identidad').value = json.contenido.nro_identidad;
            document.querySelector('#razon_social').value = json.contenido.razon_social;
            document.querySelector('#telefono').value = json.contenido.telefono;
            document.querySelector('#correo').value = json.contenido.contenido;
            document.querySelector('#departamento').value = json.contenido.departamento;
            document.querySelector('#direccion').value = json.contenido.direccion;
            document.querySelector('#rol').value = json.contenido.rol;
        }else{
            window.location = base_url+"personas"; 
        }
        console.log(json);
} catch (error) {
    console.log("Opps ocurrio un error" + error);
}

}

async function Actualizarpersona() {
    try {
        const datos = new FormData(formRegistrarper);
        let respuesta = await fetch(base_url + 'controller/persona.php?tipo=Actualizar', {
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
async function fnt_eliminar(id) {
    const formdata = new FormData();
    formData.append('id_persona',id);
    try {
        let respuesta = await fetch
        (base_url + 'controller/persona.php?tipo=eliminar',{
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
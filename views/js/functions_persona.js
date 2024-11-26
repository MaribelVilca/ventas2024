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
    }catch(error){
        console.log("Oops salio un error al listar persona" + error);
    } 
 }
 if (document.querySelector('#tbl_persona')){
 listar_persona();
 
 }
 


async function Registrar(){
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
    let estado = document.getElementById('estado').value;
    let fecha_reg = document.getElementById('fecha_reg').value;
  
    if (!nro_identidad || !razon_social || !telefono || !correo || !departamento || !provincia || !distrito || !cod_postal || !direccion || !rol || !password || !estado || !fecha_reg) {
        alert("Error, campos vacíos");
        return;
    }

    try {
        const datos = new FormData(document.getElementById('frmRegistrar'));

        let respuesta = await fetch(base_url + 'controller/persona.php?tipo=Registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        let json = await respuesta.json();
        if (json.status) {
            swal("Registro", json.mensaje, "success");
        } else {
            swal("Registro", json.mensaje, "error");
        }
    } catch (e) {
        console.log("Oops, ocurrió un error: " + e);
    }
}

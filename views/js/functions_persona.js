async function registrar_persona(){
    let nro_identidad = document.getElementById('#nro_identidad').value;
    let razon_social= document.querySelector('#razon_social').value;
    let telefono= document.querySelector('#telefono').value;
    let correo= document.querySelector('#correo').value;
    let departamento = document.querySelector('#departamento').value;
    let provincia = document.querySelector('#provincia').value;
    let distrito = document.querySelector('#distrito').value;
    let cod_postal = document.querySelector('#cod_postal').value;
    let direccion = document.querySelector('#direccion').value;
    let rol = document.querySelector('#rol').value;
    let password = document.querySelector('#password').value;
    let estado = document.querySelector('#estado').value;
    let fecha_reg = document.querySelector('#fecha_reg').value;
  
    if(nro_identidad==""|| razon_social ==""||telefono==""|| correo==""|| departamento==""|| provincia==""|| distrito==""|| cod_postal==""|| direccion==""|| rol==""|| password==""
        || estado==""|| fecha_reg==""){
        alert("error,campos vacios");
        return;

    }
    try{
   
        const datos = new FormData(frmRegistrar);
        //enviar datos hacia el controlador//
        let respuesta = await fetch(base_url + 'controller/persona.php?tipo=registrar', {
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
    async function listar_persona() {
        try{
            let respuesta = await fetch(base_url +'controller/persona.php?tipo=listar');
            console.log(respuesta);
           json = await respuesta.json();
           if(json.status){
            let datos = json.contenido;
            let contenido_select = '<option value="">Seleccione</option>';
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id +'">' + element.nombre + '</option>';
               
            });
            document.getElementById('persona').innerHTML = contenido_select;
        }
         console.log(respuesta);
        }catch (e) {
            console.log("Error al cargar persona" + e);
        }
    }
   
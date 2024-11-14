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
            let datos = json.contenido;
            let contenido_select = '<option value="">Seleccione</option>';
            datos.forEach(element => {
                contenido_select += '<option value="' + element.id +'">' + element.nombre + '</option>';
              
            });
            document.getElementById('categoria').innerHTML = contenido_select;
        }
         console.log(respuesta);
        }catch (e) {
            console.log("Error al cargar categorias" + e);
        }
    }
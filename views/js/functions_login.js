async function iniciar_sesion() {
    let usuario = document.querySelector('#username').value;
    let password = document.querySelector('#password').value;

    if (usuario === "" || password === "") {
        alert('Campos vacíos');
        return;
    }



    try {
        const datos = new FormData(frm_iniciar_sesion);

        let respuesta = await fetch(base_url + 'controller/login.php?tipo=iniciar_sesion', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            swal("iniciar_sesion", json.mensaje, "success");
            location.replace(base_url+"nuevo-producto");
        } else {
            swal("iniciar_sesion", json.mensaje, "error");
        }
        console.log(json);

    } catch (e) {
        console.log("Oops, ocurrio un error" + e);
    }

}




if (document.querySelector('#frm_iniciar_sesion')) {
    let from_iniciar_sesion = document.querySelector('#frm_iniciar_sesion');
    from_iniciar_sesion.onsubmit = function (e) {
        e.preventDefault();
        iniciar_sesion();
    }
}
    async function cerrar_sesion() {
        
        try{
       let respuesta =await fetch(base_url + 'controller/login.php?tipo=cerrar-sesion', {
        method: 'POST',
        mode: 'cors',
        cache: 'no-cache'
       });
 json = await respuesta.json();
 if (json.status){
 location.replace(base_url + "login");
        }
    } catch (error){
        console.log('ocurrio un error');
    }
    }
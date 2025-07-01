function validar_form() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    
    if (nombre == "" || detalle == "") {
        alert("Error:Existen Campos Vacíos");
        return;
    }
    
    registrarCategoria();


    /*Swal.fire({
        
        title: "Registro exitoso!",
        icon: "Correcto",
        draggable: true
        
    });*/
    
}


if (document.querySelector('#frm_categoria')) {
    //Evita que se envíe el formulario
    let frm_categoria = document.querySelector('#frm_categoria');
    frm_categoria.onsubmit = function (e) {
        e.preventDefault();
        validar_form();////////
    }
}



async function registrarCategoria(){
   try{
        //capturar campos de formulario (HTML)
        const datos = new FormData(frm_categoria);
        //enviar datos a controlador
        let respuesta = await fetch(base_url+'control/CategoriaController.php?tipo=registrar',{///////
            method:'POST',
            mode:'cors',
            cache:'no-cache',
            body: datos
        });

        
        let json = await respuesta.json();
        // Esta condicion es la validadcion de  que (json.status sea = true)
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_categoria').reset();
        }else{
            alert(json.msg);
        }

    }catch(e) {
        console.log("Error al registrar Categoria:" + e);
    }
}


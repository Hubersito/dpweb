function validar_form() {
    let nro_documento = document.getElementById("nro_doc").value;
    let Razón_Social = document.getElementById("nombre").value;
    let Teléfono = document.getElementById("telefono").value;
    let Correo = document.getElementById("correo").value;
    let Departamento = document.getElementById("departamento").value;
    let Provincia = document.getElementById("provincia").value;
    let Distrito = document.getElementById("distrito").value;
    let Codigo_Postal = document.getElementById("cod_postal").value;
    let Dirección = document.getElementById("direccion").value;
    let Rol = document.getElementById("rol").value;
    if (nro_documento == "" || Razón_Social == "" || Teléfono == "" || Correo == "" || Departamento == "" || Provincia == "" || Distrito == "" || Codigo_Postal == "" || Dirección == "" || Rol == "") {
        alert("Error:Existen Campos Vacíos");
        return;
    }
    Swal.fire({
        
        title: "Registro exitoso!",
        icon: "Correcto",
        draggable: true
        
    });
    
    registrarUsuario();
    

}


if (document.querySelector('#frm_user')) {
    //Evita que se envíe el formulario
    let frm_user = document.querySelector('#frm_user');
    frm_user.onsubmit = function (e) {
        e.preventDefault();
        validar_form();
    }
}

async function registrarUsuario(params){
   try{
        //capturar campos de formulario (HTML)
        const datos = new FormData(frm_user);
        //enviar datos a controlador
        let respuesta = await fetch(base_url+'control/UsuarioController.php ? tipo=registrar',{
            method:'POST',
            mode:'cors',
            cache:'no-cache',
            body: datos
    
        });
    }catch(e) {
        console.log("Error al registrar Usuario:" + e);
    }
}










function validar_form() {
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;

    if (nombre == "" || detalle == "") {
        alert("Error:Existen Campos Vacíos");
        return;
    }

    registrarCategoria();

    Swal.fire({

        title: "Registro exitoso!",
        icon: "Correcto",
        draggable: true

    });

}


if (document.querySelector('#frm_categoria')) {
    //Evita que se envíe el formulario
    let frm_categoria = document.querySelector('#frm_categoria');
    frm_categoria.onsubmit = function (e) {
        e.preventDefault();
        validar_form();////////
    }
}



async function registrarCategoria() {
    try {
        //capturar campos de formulario (HTML)
        const datos = new FormData(frm_categoria);
        //enviar datos a controlador
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=registrar', {///////
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });


        let json = await respuesta.json();
        // Esta condicion es la validadcion de  que (json.status sea = true)
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_categoria').reset();
        } else {
            alert(json.msg);
        }

    } catch (e) {
        console.log("Error al registrar Categoria:" + e);
    }
}








// Función para mostrar las categorías en la tabla de list-categorie.php
async function mostrarListaCategorias() {
    try {
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=ver_categorias', {
            method: 'GET',
            mode: 'cors',
            cache: 'no-cache'
        });
        let json = await respuesta.json();
        let tbody = document.getElementById('content_list_categorie');
        if (!tbody) return; // Solo ejecuta si existe el tbody en la página
        tbody.innerHTML = '';
        if (json.length > 0) {
    json.forEach((cat, idx) => {
        tbody.innerHTML += `
            <tr>
                <td>${idx + 1}</td>
                <td>${cat.nombre}</td>
                <td>${cat.detalle}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="eliminarCategoria(${cat.id})">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                </td>
            </tr>
        `;
    });
} else {
    tbody.innerHTML = `<tr><td colspan="4" class="text-center">No hay categorías registradas</td></tr>`;
}
    } catch (e) {
        console.log("Error al mostrar categorías: " + e);
    }
}

// Llama a la función solo si existe el tbody en la página actual
if (document.getElementById('content_list_categorie')) {
    mostrarListaCategorias();
}



async function eliminarCategoria(id) {
    if (!confirm('¿Seguro que deseas eliminar esta categoría?')) return;
    try {
        let datos = new FormData();
        datos.append('id', id);
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=eliminar', {
            method: 'POST',
            body: datos
        });
        let json = await respuesta.json();
        alert(json.msg);
        mostrarListaCategorias(); // Refresca la tabla
    } catch (e) {
        alert('Error al eliminar la categoría');
        console.log(e);
    }
}
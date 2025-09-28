function validar_form() {
    let codigo = document.getElementById("codigo").value;
    let nombre = document.getElementById("nombre").value;
    let detalle = document.getElementById("detalle").value;
    let precio = document.getElementById("precio").value;
    let stock = document.getElementById("stock").value;
    let id_categoria = document.getElementById("categoria").value;
    let fecha_vencimiento = document.getElementById("fecha_vencimiento").value;
    let imagen = document.getElementById("imagen").value;
    let id_proveedor = document.getElementById("proveedor").value;

    // Validar que los campos no estén vacíos

    if (codigo == "" || nombre == "" || detalle == "" || precio == "" || stock == "" || id_categoria == "" || fecha_vencimiento == "" || imagen == "" || id_proveedor == "") {
        alert("Error:Existen Campos Vacíos");
        return;
    }
    registrarProducto();
}


if (document.querySelector('#frm_producto')) {
    //Evita que se envíe el formulario
    let frm_producto = document.querySelector('#frm_producto');
    frm_producto.onsubmit = function (e) {
        e.preventDefault();
        validar_form();////////
    }
}



async function registrarProducto() {
    try {
        //capturar campos de formulario (HTML)
        const datos = new FormData(frm_producto);
        //enviar datos a controlador
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=registrar', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });


        let json = await respuesta.json();
        // Esta condicion es la validadcion de  que (json.status sea = true)
        if (json.status) {
            alert(json.msg);
            document.getElementById('frm_producto').reset();
        } else {
            alert(json.msg);
        }

    } catch (e) {
        console.log("Error al registrar Producto:" + e);
    }
}








// Función para mostrar los productos en la tabla de list-products.php
async function mostrarListaProductos() {
    try {
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=ver_productos', {
            method: 'GET',
            mode: 'cors',
            cache: 'no-cache'
        });
        let json = await respuesta.json();
        let tbody = document.getElementById('content_list_products');
        if (!tbody) return; // Solo ejecuta si existe el tbody en la página
        tbody.innerHTML = '';
        if (json.length > 0) {
            json.forEach((prod, idx) => {
                tbody.innerHTML += `
            <tr>
                <td>${idx + 1}</td>
                <td>${prod.codigo}</td>
                <td>${prod.nombre}</td>
                <td>${prod.detalle}</td>
                <td>${prod.precio}</td>
                <td>${prod.stock}</td>
                <td>${prod.id_categoria}</td>
                <td>${prod.fecha_vencimiento}</td>
                <td>${prod.imagen}</td>
                <td>${prod.id_proveedor}</td>
                <td>
                    <button class="btn btn-danger btn-sm" onclick="eliminarProducto(${prod.id})">
                        <i class="bi bi-trash"></i> Eliminar
                    </button>
                </td>
            </tr>
        `;
            });
        } else {
            tbody.innerHTML = `<tr><td colspan="4" class="text-center">No hay productos registrados</td></tr>`;
        }
    } catch (e) {
        console.log("Error al mostrar productos: " + e);
    }
}

// Llama a la función solo si existe el tbody en la página actual
if (document.getElementById('content_list_products')) {
    mostrarListaProductos();
}



async function eliminarProducto(id) {
    if (!confirm('¿Seguro que deseas eliminar este producto?')) return;
    try {
        let datos = new FormData();
        datos.append('id', id);
        let respuesta = await fetch(base_url + 'control/ProductoController.php?tipo=eliminar', {
            method: 'POST',
            body: datos
        });
        let json = await respuesta.json();
        alert(json.msg);
        mostrarListaProductos(); // Refresca la tabla
    } catch (e) {
        alert('Error al eliminar el producto');
        console.log(e);
    }
}


async function cargar_categorias() {
    try {
        let respuesta = await fetch(base_url + 'control/CategoriaController.php?tipo=ver_categorias', {
            method: 'GET',
            mode: 'cors',
            cache: 'no-cache'
        });
        let json = await respuesta.json();

        const select = document.getElementById('categoria');
        if (!select) return;

        // Opción por defecto
        select.innerHTML = '<option value="">Seleccione una categoría</option>';

        // Asumiendo respuesta { data: [...] } (básico)
        if (!json || !Array.isArray(json.data)) return;

        json.data.forEach(categoria => {
            const id = categoria.id ?? categoria.id_categoria;
            const nombre = categoria.nombre ?? categoria.categoria;
            if (id && nombre) {
                const option = document.createElement('option');
                option.value = id;
                option.textContent = nombre;
                select.appendChild(option);
            }
        });
    } catch (e) {
        console.log('Error al cargar categorías: ' + e);
    }
}
// Llamada básica si existe el select en la página
if (document.getElementById('categoria')) {
    cargar_categorias();
}
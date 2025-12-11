let productos_venta = {};
let id = 2;
let id2 = 3;
let producto = {};
producto.nombre = "Producto A";
producto.precio = 10.00;
producto.cantidad = 2;
productos_venta[id] = producto;

let producto2 = {};
producto2.nombre = "Producto B";
producto2.precio = 5.00;
producto2.cantidad = 1;


productos_venta[id] = producto;
productos_venta[id2] = producto2;
console.log(productos_venta);




// Función para agregar un producto al carrito de venta
async function agregar_producto_temporal(id, precio, cantidad) {
    const datos = new FormData();
    datos.append('id_producto', id);
    datos.append('precio', precio);
    datos.append('cantidad', cantidad);

    try {
        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=registrarTemporal', {
            method: 'POST',
            body: datos
        });

        let json = await respuesta.json();

        if (json.status) {
            if (json.msg === 'registrado') {
                Swal.fire("Agregado al carrito");
            } else {
                Swal.fire("Actualizado");
            }

            if (typeof actualizarCarrito === 'function') actualizarCarrito();
        }
    } catch (e) {
        console.log(e);
    }
}




document.addEventListener('DOMContentLoaded', actualizarCarrito);



async function eliminar_temporal(id) {

    const datos = new FormData();
    datos.append('id', id);

    let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=eliminar', {
        method: 'POST',
        body: datos
    });

    let json = await respuesta.json();

    if (json.status) {
        actualizarCarrito();
        Swal.fire({ icon: "success", title: "Producto eliminado" })

    } else {
        Swal.fire({ icon: "error", title: "Error al eliminar" })
    }
    //await actualizarCarrito();
}

async function actualizarCarrito() {
    try {
        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=lista_venta_temporal');
        let json = await respuesta.json();

        if (json.status) {

            let listaTemporal = "";
            let subtotalGeneral = 0;

            json.data.forEach(t => {

                /*let subtotal = t.precio * t.cantidad;
                subtotalGeneral += subtotal;*/

                listaTemporal += `
                <tr>
                    <td>${t.nombre}</td>
                    <td><input type="number" id="cant_${t.id}" value="${t.cantidad}" style ="width: 50px;" onkeyup="actualizarSubtotal(${t.id},${t.precio}); onchange="actualizarSubtotal(${t.id},${t.precio})"></td>
                    <td>${t.precio}</td>
                    <input type="hidden" id="precio_${t.id}" value="${t.precio}">
                    <td id="subtotal_${t.id}">${t.precio * t.cantidad}</td>
                    <td>
                        <button onclick="eliminar_temporal(${t.id})" class="btn btn-sm btn-danger">
                             <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>`;
            });

            // Insertamos en la tabla
            document.getElementById("tablaCarrito").innerHTML = listaTemporal;

            /*/ Cálculos finales
            let igv = subtotalGeneral * 0.18;
            let totalFinal = subtotalGeneral + igv;

            document.getElementById("subtotal_final").textContent = subtotalGeneral.toFixed(2);
            document.getElementById("igv_final").textContent = igv.toFixed(2);
            document.getElementById("total_final").textContent = totalFinal.toFixed(2);*/

        }
    } catch (error) {
        console.log("error al cargar productos temporales" + error);
    }
}

document.addEventListener('DOMContentLoaded', actualizarCarrito);


async function actualizarSubtotal(id, precio) {
    let cantidad = document.getElementById('cant_' + id).value;
    try {
        const datos = new FormData();
        datos.append('id', id);
        datos.append('cantidad', cantidad);

        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=actualizarCantidad', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        json = await respuesta.json();
        if (json.status) {
            subtotal =cantidad * precio;
            document.getElementById('subtotal_' + id).innerHTML= 'S/'+ subtotal;
            actualizarCarrito();
        }

    } catch (error) {
        console.log("error al actualizar cantidad" + error);
    }

}

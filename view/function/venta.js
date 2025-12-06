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
async function agregar_producto_temporal() {
    let id = document.getElementById('id_producto_venta').value;
    let precio = document.getElementById('producto_precio_venta').value;
    let cantidad = document.getElementById('producto_cantidad_venta').value;

    const datos = new FormData();
    datos.append('id_producto', id);
    datos.append('precio', precio);
    datos.append('cantidad', cantidad);
    try {
        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=registrarTemporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        // corregir comprobación: status true = éxito
        if (json.status) {
            if (json.msg === 'registrado') {
                alert("El producto fue registrado");
                console.log("respuesta:", json);
            } else {
                alert("El producto fue actualizado");
                console.log("respuesta:", json);
                return;
            }
        }
    } catch (error) {
        console.log("error al agregar producto temporal" + error);
    }
}



// Acepta opcionalmente (id_param, precio_param, cantidad_param).
// Si no se pasan, lee los campos ocultos para compatibilidad con el Enter.
async function agregar_producto_temporales(id_param, precio_param, cantidad_param) {
    try {
        // Obtener valores: prioridad a parámetros si vienen
        const id = (typeof id_param !== 'undefined' && id_param !== null && id_param !== '')
            ? id_param
            : document.getElementById('id_producto_venta')?.value;

        const precioRaw = (typeof precio_param !== 'undefined' && precio_param !== null && precio_param !== '')
            ? precio_param
            : document.getElementById('producto_precio_venta')?.value;

        const cantidadRaw = (typeof cantidad_param !== 'undefined' && cantidad_param !== null && cantidad_param !== '')
            ? cantidad_param
            : document.getElementById('producto_cantidad_venta')?.value;

        const precio = parseFloat(precioRaw) || 0;
        const cantidad = parseInt(cantidadRaw) || 1;

        if (!id) {
            Swal.fire({ icon: 'warning', title: 'Producto inválido', text: 'No se encontró el id del producto.' });
            return;
        }

        const datos = new FormData();
        datos.append('id_producto', id);
        datos.append('precio', precio);
        datos.append('cantidad', cantidad);

        let respuesta = await fetch(base_url + 'control/ventaController.php?tipo=registrarTemporal', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });

        if (!respuesta.ok) throw new Error('HTTP error! status: ' + respuesta.status);
        let json = await respuesta.json();

        if (json.status) {
            if (json.msg === 'registrado') {
                Swal.fire({ icon: 'success', title: 'Añadido' });
            } else {
                Swal.fire({ icon: 'success', title: 'Actualizado' });
            }
            if (typeof refreshCart === 'function') refreshCart();
        } else {
            Swal.fire({ icon: 'error', title: 'Error', text: json.msg || 'No se pudo agregar el producto' });
        }
    } catch (error) {
        console.error("error al agregar producto temporal", error);
        Swal.fire({ icon: 'error', title: 'Error', text: 'Ocurrió un error al agregar el producto' });
    }
}





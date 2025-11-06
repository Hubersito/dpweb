async function verMisProductos() {
    try {
        let respuesta = await fetch(base_url + 'control/productosController.php?tipo=mostrar_mis_productos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache'
        });
        if (!respuesta.ok) throw new Error(`HTTP error! status: ${respuesta.status}`);

        let json = await respuesta.json();

        if (json.status && json.data && json.data.length > 0) {
            let html = '';
            json.data.forEach((producto, index) => {
                const imgSrc = producto.imagen
                    ? `${base_url}uploads/productos/${producto.imagen}`
                    : `${base_url}uploads/no-image.png`;

                html += `<tr>
                    <td>${index + 1}</td>
                    <td><img src="${imgSrc}" alt="${producto.nombre || ''}" style="height:50px;object-fit:cover;" onerror="this.src='${base_url}uploads/no-image.png'"></td>
                    <td>${producto.codigo || ''}</td>
                    <td>${producto.nombre || ''}</td>
                    <td>${producto.precio || ''}</td>
                    <td>
                        <a href="${base_url}productos-edit/${producto.id}" class="btn btn-primary btn-sm">Editar</a>
                        <button onclick="eliminar(${producto.id})" class="btn btn-danger btn-sm">Eliminar</button>
                    </td>
                </tr>`;
            });
            document.getElementById('content_productos').innerHTML = html;
        } else {
            document.getElementById('content_productos').innerHTML = '<tr><td colspan="6">No hay productos disponibles</td></tr>';
        }
    } catch (error) {
        console.error("Error al cargar productos:", error);
        document.getElementById('content_productos').innerHTML = '<tr><td colspan="6">Error al cargar los productos</td></tr>';
    }
}

if (document.getElementById('content_productos')) {
    verMisProductos();
}
let productos_venta = {};
let id =2; 
let id2 =3;
let producto={};
producto.nombre = "Producto A";
producto.precio = 10.00;
producto.cantidad = 2;
productos_venta[id] = producto;

let producto2={};
producto2.nombre = "Producto B";
producto2.precio = 5.00;
producto2.cantidad = 1;
productos_venta[id2] = producto2;
//productos_venta.push(producto);
console.log(productos_venta);

productos_venta.splice(id,1);
console.log(productos_venta);

// Función para agregar un producto al carrito de venta

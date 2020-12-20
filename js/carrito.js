var carrito = []

function verCarrito() {
    for(articulo of carrito)
        alert(articulo.nombre + " " + articulo.apellido)
}

function addToCart(nombre, marca) {
    carrito.push({
        nombre: nombre,
        marca: marca
    })
}
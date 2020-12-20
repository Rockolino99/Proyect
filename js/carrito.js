//var carrito = [{nombre: "juan", apellido: "perez"}]

function verCarrito() {
    //bodyCarrito
    $.ajax({
        url: 'controllers/controller_getCart.php',
        success: function(res) {
            $('#bodyCarrito').empty()
            $('#bodyCarrito').append(res)
        }
    })
}

function addToCart(nombre, cantidad, precio, imagen, idCategoria, idInventario, i) {
    $.ajax({
        type: 'POST',
        data: {
            nombre: nombre,
            cantidad: cantidad,
            precio: precio,
            imagen: imagen,
            idCategoria: idCategoria,
            idInventario: idInventario
        },
        url: 'controllers/controller_addToCart.php',
        success: function(res) {
            swal({
                icon: 'success',
                text: '¡Agregado al carrito!',
                buttons: false,
                timer: 2000
            })
            $('#modalVistaPrevia' + i).modal('hide')
        }
    })
}

function dropCart(idCarrito) {
    $.ajax({
        type: 'POST',
        data: {
            idCarrito: idCarrito
        },
        url: 'controllers/controller_deleteCart.php',
        success: function() {
            verCarrito()
            swal({
                icon: 'success',
                text: 'Eliminado del carrito!',
                buttons: false,
                timer: 2000
            })
        }
    })
}
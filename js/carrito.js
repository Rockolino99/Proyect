$(document).ready(updateCarrito())

function updateCarrito() { //#carrito
    $.ajax({
        url: 'controllers/controller_getNumCart.php',
        success: function(value) {
            $('#carrito').empty()
            $('#carrito').append(" " + value)
        }
    })
}

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

function finCompra(num) {

    if (num == '0') {
        swal({
            icon: 'error',
            text: '¡Debes iniciar sesión para poder realizar la compra!',
            buttons: false,
            timer: 3000
        })
        return
    }

    $.ajax({
            url: 'controllers/controller_getNumCart.php',
            success: function(value) {
                if (value == 0) {
                    swal({
                        icon: 'error',
                        text: '¡Debes agregar algo al carrito!',
                        buttons: false,
                        timer: 2000
                    })
                    return
                } else {
                    location.assign('index.php?mod=fincompra')
                }
            }
        })
        /*
        
        
         */
}

function getCartFinal() {
    $.ajax({
        url: 'controllers/controller_finCompra.php',
        success: function(data) {
            $('#productosCarritoFinal').append(data)
            //Esto es para que agregue lo del controlador finCompra al div de fincompra.php.
            //En controller_finCompra.php va todo el diseño relacionado con el carrito, que es lo que se va a comprar
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
            updateCarrito()
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
    updateCarrito()
    $.ajax({
        type: 'POST',
        data: {
            idCarrito: idCarrito
        },
        url: 'controllers/controller_deleteCart.php',
        success: function() {
            verCarrito()
            updateCarrito()
            swal({
                icon: 'success',
                text: 'Eliminado del carrito!',
                buttons: false,
                timer: 2000
            })
        }
    })
}

function deleteAllCart() {
    updateCarrito()
    $.ajax({
        url: 'controllers/controller_deleteAllCart.php',
        success: function() {
            verCarrito()
        }
    })
}
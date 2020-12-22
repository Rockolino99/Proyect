$(document).ready(updateCarrito())
var categorias = []

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

function verNota(nombre, idUsuario) {
    alert(idUsuario)
    idNota = '45'
    direccion = "Chapulines #402"
    direccion = direccion.replace('#','_')
    cp = "20156"
    envio = $('#envio').val()
    iva = $('#iva').val()
    subtotal = $('#subtotal').val()
    cupon = $('#cupon').val()
    modo = $('input:radio[name=type]:checked').val() == 'oxxo'? "OXXO" : "TARJETA DE CREDITO"
    
    /*$.ajax({
       type: 'POST',
       data:{
           nombre: nombre,
           envio: envio,
           iva: iva,
           subtotal: subtotal,
           cupon: cupon,
           modo: modo
       },
       url: 'pdf/nota.php',
       success: function(res){
        alert(res)
       } 
    })*/
    
    var datos = 'nombre='+nombre+'&envio='+envio+'&direccion='+direccion+'&modo='+modo+'&idNota='+idNota+
    '&cp='+cp+'&iva='+iva+'&cupon='+cupon+'&subtotal='+subtotal
    //IMPORTANTE
    window.open('pdf/nota.php?'+datos,'_blank')
}
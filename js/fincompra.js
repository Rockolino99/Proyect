function finalizarCompra() {
    var nombre = $('#name').val()
    var number = $('#number').val()
    var codigo = $('#security').val()
    var nombreCompleto = $('#nombreCompleto').val()
    var telefono = $('#telefono').val()
    var cp = $('#cp').val()
    var dir = $('#direccion').val()


    //nombre completo
    if (nombreCompleto == null || nombreCompleto.length == 0 || /^\s+$/.test(nombreCompleto)) {
        swal({
            icon: 'warning',
            text: '¡Ingrese su nombre en la dirección!',
            buttons: false,
            timer: 2000
        })
        $('#nombreCompleto').focus()
        return
    }
    //telefono
    if (telefono == null || telefono.length == 0 || telefono.length < 10 || telefono.length > 10) {
        swal({
            icon: 'warning',
            text: '¡Ingresa un teléfono valido!',
            buttons: false,
            timer: 2000
        })
        $('#telefono').focus()
        return
    }
    //direccion
    if (dir == null || dir.length == 0 || /^\s+$/.test(dir)) {
        swal({
            icon: 'warning',
            text: '¡Ingrese su dirección!',
            buttons: false,
            timer: 2000
        })
        $('#direccion').focus()
        return
    }
    //codigo postal
    if (cp == null || cp.length == 0) {
        swal({
            icon: 'warning',
            text: '¡Ingresa un código postal valido!',
            buttons: false,
            timer: 2000
        })
        $('#cp').focus()
        return
    }
    //numero de la tarjeta
    if (number == null || number.length == 0 || number.length < 16 || number.length > 16) {
        swal({
            icon: 'warning',
            text: '¡Ingresa una tarjeta valida!',
            buttons: false,
            timer: 2000
        })
        $('#number').focus()
        return
    }

    //validación nombre
    if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
        swal({
            icon: 'warning',
            text: '¡Ingrese su nombre!',
            buttons: false,
            timer: 2000
        })
        $('#InputNombre').focus()
        return
    }
    //codigo de verificacion
    if (codigo == null || codigo.length == 0 || codigo.length < 3 || codigo.length > 3) {
        swal({
            icon: 'warning',
            text: '¡Ingresa un código valido!',
            buttons: false,
            timer: 2000
        })
        $('#security').focus()
        return
    }



}
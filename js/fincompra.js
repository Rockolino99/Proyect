function finalizarCompra() {
    var nombre = $('#name').val()
    var number = $('#number').val()
    var codigo = $('#security').val()

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
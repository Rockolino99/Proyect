function finalizarCompra() {
    var nombre = $('#name').val()
   

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
}

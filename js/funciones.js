function addArticulo() {
    $.ajax({
        type: 'POST',
        data: {
            nombre: $('#nombre').val(),
            marca: $('#marca').val(),
            idProveedor: parseInt($('#idProveedor').val()),
            idCategoria: parseInt($('#idCategoria').val()),
            descripcion: $('#descripcion').val()
        },
        url: "controllers/controller_addArticulo.php",
        success: function (result) {
            getLastArticulo(result)
        }
    })
}

function getArticulo() {
    $.ajax({
        url: "controllers/controller_getArticulo.php",
        success: function (result) {
            $('#patas1').empty()
            $('#patas1').append(result)
        }
    })
}

function getLastArticulo(id) {
    $.ajax({
        type: 'POST',
        data: {
            idArticulo: id
        },
        url: "controllers/controller_getLastArticulo.php",
        success: function (result) {
            $('#patas1').append(result)
        }
    })
}

function getProveedores() {
    $.ajax({
        url: "controllers/controller_getProveedores.php",
        success: function (result) {
            $('#selectProveedor').append(result)
        }
    })
}

$(document).ready(function () {
    getArticulo()
    getProveedores()

})

function registro() {
    var nombre = $('#nombre').val()
    var ap_paterno = $('#apat').val()
    var ap_materno = $('#amat').val()
    var correo = $('#correo').val()
    var direccion = $('#direccion').val()
    var password = $('#pass').val()
    var password2 = $('#pass2').val()

    //validacion nombre
    $('#nombre').focus()
    if (nombre == '') {
        alert("¡Nombre Incorrecto!")
        return
    }

    //validacion ap_paterno
    $('#apat').focus()
    if (ap_paterno == '') {
        alert("¡Apellido Paterno Incorrecto!")
        return
    }

    //validacion ap_materno
    $('#amat').focus()
    if (ap_materno == '') {
        alert("¡Apellido Materno Incorrecto!")
        return
    }

    //validacion correo
    $('#correo').focus()
    if (correo == '') {
        alert("¡Correo Incorrecto!")
        return
    }

    //validacion direccion
    $('#direccion').focus()
    if (direccion == '') {
        alert("¡Dirección Incorrecta!")
        return
    }

    //validacion password
    if (password != password2) {
        alert("¡Las contraseñas no Coinciden!")
        $('#pass2').focus()
        return
    }

    $.ajax({
        type: 'POST',
        data: {
            nombre: nombre,
            apellido_paterno: ap_paterno,
            apellido_materno: ap_paterno,
            correo: correo,
            password: password,
            direccion: direccion
        },
        url: "controllers/controller_RegistroUsuario.php",
        success: function (result) {
            alert(result)
        }
    })
}
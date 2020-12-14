$(document).ready(function () {
    getArticulo()
    getProveedores()

})

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

function registro() {
    var nombre = $('#nombre').val()
    var ap_paterno = $('#apat').val()
    var ap_materno = $('#amat').val()
    var correo = $('#correo').val()
    var direccion = $('#direccion').val()
    var password = $('#pass').val()
    var password2 = $('#pass2').val()

    //validación nombre
    if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
        alert("¡Nombre Incorrecto!")
        $('#nombre').focus()
        return
    }

    //validación ap_paterno   
    if (ap_paterno == null || ap_paterno.length == 0 || /^\s+$/.test(ap_paterno)) {
        alert("¡Apellido Paterno Incorrecto!")
        $('#apat').focus()
        return
    }

    //validación ap_materno
    if (ap_materno == null || ap_materno.length == 0 || /^\s+$/.test(ap_materno)) {
        alert("¡Apellido Materno Incorrecto!")
        $('#amat').focus()
        return
    }

    //validación de correo
    if (correo == null || correo.length == 0 || !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w/.test(correo))) {
        alert("¡Ingrese una dirección de correo válida!")
        $('#correo').focus()
        return
    }

    //validación direccion
    if (direccion == null || direccion.length == 0 || /^\s+$/.test(direccion)){
        alert("¡Dirección Incorrecta!")
        $('#direccion').focus()
        return
    }

    //validación password    
    if (password == null || password.length == 0 || /^\s+$/.test(password)) {
        alert("¡Ingresa una contraseña!")
        $('#pass').focus()
        return
    }
    
    if (password2 == null || password2.length == 0 || /^\s+$/.test(password2)) {
        alert("¡Repite la contraseña!")
        $('#pass2').focus()
        return
    }

    if (password != password2) {
        alert("¡Las contraseñas no coinciden!")
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
            swal("ÉXITO", "Usuario registrado exitosamente.", "success");
            swal({
                icon: 'success',
                title: 'ÉXITO',
                text: 'Usuario registrado exitosamente. Ahora puede inciar sesión.',
                buttons: false,
                timer: 4000
            })
        }
    })
    $('#formularioRegistro').trigger('reset')
    $('#modalRegistro').modal('hide')
}

function login() {

    var correo = $('#correoLogin').val()
    var contrasena = $('#contrasena').val()

    if (correo == null || correo.length == 0 || /^\s+$/.test(correo)) {
        alert("¡Usuario requerido!")
        $('#correoLogin').focus()
        return
    }

    if (contrasena == null || contrasena.length == 0 || /^\s+$/.test(contrasena)) {
        alert("Contraseña requerida!")
        $('#contrasena').focus()
        return
    }

    $.ajax({
        type: 'POST',
        data: {
            correo: correo,
            contra: contrasena,
        },
        url: "controllers/controller_Login.php",
        success: function (result) {
            switch (result) {
                case '1'://Inicio de sesión
                    location.reload()
                    break
                case '-1'://Contraseña incorrecta
                    swal({
                        icon: 'error',
                        title: 'ERROR',
                        text: 'Contraseña incorrecta',
                        buttons: false,
                        timer: 2000
                    })
                    $('#contrasena').focus()
                    break
                case '0'://No hay correo registrado
                    swal({
                        icon: 'warning',
                        title: 'ERROR',
                        text: 'El correo no está registrado',
                        buttons: false,
                        timer: 2000
                    })
                    $('#correoLogin').focus()
                    break
                case '3'://Cuenta bloqueada
                    swal({
                        icon: 'warning',
                        title: 'ADVERTENCIA',
                        text: 'Su cuenta ha sido bloqueada. Por favor, reestablezca su contraseña.',
                        buttons: false,
                        timer: 3000
                    })
                    //$('#formularioLogin').reset()
                    break
                case '2'://3er intento erróneo, bloqueado
                    swal({
                        icon: 'warning',
                        title: 'Demasiados intentos fallidos',
                        text: 'Reestablezca su contraseña.',
                        buttons: false,
                        timer: 2500
                    })
                    //$('#formularioLogin').reset()
                    break
            }
        }
    })

}
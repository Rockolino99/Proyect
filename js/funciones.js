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
        swal({
            icon: 'warning',
            text: '¡Ingresa tu nombre!',
            buttons: false,
            timer: 2000
        })
        $('#nombre').focus()
        return
    }

    //validación ap_paterno   
    if (ap_paterno == null || ap_paterno.length == 0 || /^\s+$/.test(ap_paterno)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa tu Apellido Paterno!',
            buttons: false,
            timer: 2000
        })
        $('#apat').focus()
        return
    }

    //validación ap_materno
    if (ap_materno == null || ap_materno.length == 0 || /^\s+$/.test(ap_materno)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa tu Apellido Materno!',
            buttons: false,
            timer: 2000
        })
        $('#amat').focus()
        return
    }

    //validación de correo
    if (correo == null || correo.length == 0 || !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w/.test(correo))) {
        //alert("¡Ingrese una dirección de correo válida!")
        swal({
            icon: 'warning',
            text: '¡Ingresa una direccion de correo electrónico válida!',
            buttons: false,
            timer: 2000
        })
        $('#correo').focus()
        return
    }

    //validación direccion
    if (direccion == null || direccion.length == 0 || /^\s+$/.test(direccion)){
        swal({
            icon: 'warning',
            text: '¡Ingresa tu direccion!',
            buttons: false,
            timer: 2000
        })
        $('#direccion').focus()
        return
    }

    //validación password    
    if (password == null || password.length == 0 || /^\s+$/.test(password)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa tu contraseña!',
            buttons: false,
            timer: 2000
        })
        $('#pass').focus()
        return
    }
    
    if (password2 == null || password2.length == 0 || /^\s+$/.test(password2)) {
        swal({
            icon: 'warning',
            text: '¡Vuelve a escribir tu contraseña!',
            buttons: false,
            timer: 2000
        })
        $('#pass2').focus()
        return
    }

    if (password != password2) {
        swal({
            icon: 'error',
            text: '¡Las contraseñas no coinciden!',
            buttons: false,
            timer: 2000
        })
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
            if(result == '0') {
                swal({
                    icon: 'error',
                    title: 'ERROR',
                    text: 'El correo ya está registrado. Intente con otro.',
                    buttons: false,
                    timer: 4000
                })
            } else {
                swal({
                    icon: 'success',
                    title: 'ÉXITO',
                    text: 'Usuario registrado exitosamente. Ahora puede inciar sesión.',
                    buttons: false,
                    timer: 4000
                })
                $('#formularioRegistro').trigger('reset')
                $('#modalRegistro').modal('hide')
            }
        }
    })
}

function login() {

    var correo = $('#correoLogin').val()
    var contrasena = $('#contrasena').val()

    if (correo == null || correo.length == 0 || !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w/.test(correo))) {
        swal({
            icon: 'info',
            text: '¡Ingresa un correo electrónico válido!',
            buttons: false,
            timer: 2000
        })
        $('#correoLogin').focus()
        return
    }

    if (contrasena == null || contrasena.length == 0 || /^\s+$/.test(contrasena)) {
        swal({
            icon: 'info',
            text: '¡Ingresa tu contraseña!',
            buttons: false,
            timer: 2000
        })
        $('#contrasena').focus()
        return
    }

    var captcha_text = $('#captcha').val()
    $.ajax({
        url: "php/getCaptchaText.php",
        success: function(data) {
            if(captcha_text != data) {
                swal({
                    icon: 'error',
                    text: '¡Captcha Incorrecto!',
                    buttons: false,
                    timer: 2000
                })
                return
            }
            doLogin(correo, contrasena)
        },
    })

}

function doLogin(correo, contrasena) {
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
                    $('#formularioLogin').trigger('reset')
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
                    $('#formularioLogin').trigger('reset')
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
                    $('#formularioLogin').trigger('reset')
                    break
                case '2'://3er intento erróneo, bloqueado
                    swal({
                        icon: 'warning',
                        title: 'Demasiados intentos fallidos',
                        text: 'Reestablezca su contraseña.',
                        buttons: false,
                        timer: 2500
                    })
                    $('#formularioLogin').trigger('reset')
                    break
            }
        }
    })
}

function reestablecerPass() {
    var correo = $('#correoRestablecer').val()
    var pass1 = $('#passReestablecer1').val()
    var pass2 = $('#passReestablecer2').val()

    if (correo == null || correo.length == 0 || !(/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w/.test(correo))) {
        swal({
            icon: 'warning',
            text: '¡Ingresa un correo electrónico válido!',
            buttons: false,
            timer: 2000
        })
        $('#correoRestablecer').focus()
        return
    }

    if (pass1 == null || pass1.length == 0 || /^\s+$/.test(pass1)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa tu contraseña!',
            buttons: false,
            timer: 2000
        })
        $('#passReestablecer1').focus()
        return
    }

    if (pass2 == null || pass2.length == 0 || /^\s+$/.test(pass2)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa nuevamente tu contraseña!',
            buttons: false,
            timer: 2000
        })
        $('#passReestablecer2').focus()
        return
    }

    if(pass1 != pass2) {
        swal({
            icon: 'info',
            text: '¡Las contraseñas no coinciden!',
            buttons: false,
            timer: 2000
        })
        $('#passReestablecer2').focus()
        return
    }
    $.ajax({
        type: 'POST',
        data: {
            correo: correo,
            contra: pass1
        },
        url: 'controllers/controller_RestPass.php',
        success: function(result) {
            switch(result) {
                case '0'://Mal
                swal({
                    icon: 'error',
                    text: '¡Dirección de correo electrónico no registrada!',
                    buttons: false,
                    timer: 2500
                })
                    break;
                case '1'://Bien
                swal({
                    icon: 'success',
                    text: 'Contraseña reestablecida exitosamente',
                    buttons: false,
                    timer: 2500
                })
                    break
            }
        }
    })

    $('#form_RestablecerPass').trigger('reset')
    $('#modalReestablecer').modal('hide')
}
//funciones para captcha
//Poner nueva imagen
function newCaptcha(){
    document.querySelector(".captcha-image").src ='captcha.php?' + Date.now();
}

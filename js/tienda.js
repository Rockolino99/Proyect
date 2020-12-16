var archivoValido = false

$(document).ready(function () {
    getArticulo()
    getProveedores()
    getCategorias()
})

function addArticulo() {
    var nombre = $('#nombreArticulo').val()
    var marca = $('#marca').val()
    var proveedor = $('#idProveedor').val()
    var categoria = $('#idCategoria').val()
    var descripcion = $('#descripcion').val()
    var existencia = $('#existencia').val()
    var talla = $('#talla option:selected').val()

    var precio = $('#precio').val()
    var color = $('#color').val()
    var imagen = $('#image').val()
    
    //validación nombre
    if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa nombre de artículo!',
            buttons: false,
            timer: 2000
        })
        $('#nombreArticulo').focus()
        return
    }

    //validación marca  
    if (marca == null || marca.length == 0 || /^\s+$/.test(marca)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa una marca!',
            buttons: false,
            timer: 2000
        })
        $('#marca').focus()
        return
    }

    //validación proveedores
    if (proveedor == null || proveedor.length == 0 || /^\s+$/.test(proveedor)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa un proveedor!',
            buttons: false,
            timer: 2000
        })
        return
    }

    //validación categoría
    if (categoria == null || categoria.length == 0 || /^\s+$/.test(categoria)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa una categoría!',
            buttons: false,
            timer: 2000
        })
        return
    }

     //validación descripción    
     if (descripcion == null || descripcion.length == 0 || /^\s+$/.test(descripcion)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa una descripción!',
            buttons: false,
            timer: 2000
        })
        $('#descripcion').focus()
        return
    }

    //validación existencia
    if(existencia.length == null || existencia.length == 0 || isNaN(existencia)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa la existencia!',
            buttons: false,
            timer: 2000
        })
        $('#existencia').focus()
        return
    }

    //validación talla
    if(talla.length == null || talla.length == 0 || isNaN(talla)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa la talla!',
            buttons: false,
            timer: 2000
        })
        $('#talla').focus()
        return
    }

    //validación precio
    if(precio.length == null || precio.length == 0 || isNaN(precio)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa el precio!',
            buttons: false,
            timer: 2000
        })
        $('#precio').focus()
        return
    }

    //validación color
    if (color == null || color.length == 0 || /^\s+$/.test(color)) {
        swal({
            icon: 'warning',
            text: '¡Ingresa un color de prenda!',
            buttons: false,
            timer: 2000
        })
        $('#color').focus()
        return
    }

    //validar imagen
    if(imagen == '') {
        swal({
            icon: 'warning',
            text: '¡Ingresa una imagen!',
            buttons: false,
            timer: 2000
        })
        $('#image').focus()
        return
    }
    //fin validar  
    
    /*$.ajax({
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
    })*/

    //Carga Imagen
    var formData = new FormData();
    var files = $('#image')[0].files[0];
    formData.append('file', files);
    $.ajax({
        url: 'php/uploadImage.php',
        type: 'post',
        data: formData,
        contentType: false,
        processData: false,
        success: function (response) {
            if (response == 0) {
                swal({
                    icon: 'error',
                    text: '¡Formato de imagen incorrecto!',
                    buttons: false,
                    timer: 2000
                })
                return
            }
            //Envío de datos


            //$(".card-img-top").attr("src", response);
            $('#modalAddArticulo').modal('hide')
            swal({
                icon: 'success',
                text: '¡Artículo añadido con éxito!',
                buttons: false,
                timer: 2000
            })
        }
    })
    //$('#image').val() obtener ruta y nombre de nueva imagen
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
            $('#listProveedores').append(result)
        }
    })
}

function getCategorias() {
    $.ajax({
        url: "controllers/controller_getCategoria.php",
        success: function (result) {
            $('#listaCategorias').append(result)
        }
    })
}

function cambioCategoria(elemento) {
    $('#idCategoria').val($(elemento).text())
    $('#idCategoria').attr('data-idcategoria', $(elemento).data('idcategoria'))
}

function cambioProveedor(elemento) {
    $('#idProveedor').val($(elemento).text())
    $('#idProveedor').attr('data-idproveedor', $(elemento).data('idproveedor'))
}
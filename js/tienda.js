var idPr

$(document).ready(function () {
    getArticulo()
    getProveedores()
    getCategorias()
})

function addArticulo() {
    //Validar todo

    //fin validar
    /*
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
            if (response != 0) {
                alert(response)
                //$(".card-img-top").attr("src", response);
            } else {
                alert('Formato de imagen incorrecto.');
            }
        }
    })
    //$('#image').val() obtener ruta y nombre de nueva imagen
    return false;
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
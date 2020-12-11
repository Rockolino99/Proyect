function addArticulo() {
    $.ajax({
        type: 'POST',
        data: {
            nombre: $('#nombre').val(),
            marca:  $('#marca').val(),
            idProveedor:  parseInt($('#idProveedor').val()),
            idCategoria:  parseInt($('#idCategoria').val()),
            descripcion:  $('#descripcion').val()
        },
        url: "controllers/controller_addArticulo.php",
        success: function(result) {
            getLastArticulo(result)
        }
    })
}

function getArticulo() {
    $.ajax({
        url: "controllers/controller_getArticulo.php",
        success: function(result) {
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
        success: function(result) {
            $('#patas1').append(result)
        }
    })
}

function getProveedores() {
    $.ajax({
        url: "controllers/controller_getProveedores.php",
        success: function(result) {
            $('#selectProveedor').append(result)
        }
    })
}
$(document).ready(function(){
    getArticulo()
    getProveedores()
})
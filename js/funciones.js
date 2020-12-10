function addArticulo() {
    $.ajax({
        type: 'POST',
        url: "controllers/controller_addArticulo.php",
        success: function(result) {
            getArticulo()
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
$(document).ready(function(){
    getArticulo()
})
function addArticulo() {
    $.ajax({
        type: 'POST',
        url: "controllers/controller_addArticulo.php",
        success: function(result) {
            alert(result)
        }
    })
}
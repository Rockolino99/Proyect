function verGrafica() {

    $.ajax({
        url: 'controllers/controller_getGrafica.php',
        success: function(data) {
            data = JSON.parse(data)
            var data = [{
                values: [data[0].cantidad, data[1].cantidad, data[2].cantidad, data[3].cantidad],
                labels: [data[0].nombre, data[1].nombre, data[2].nombre, data[3].nombre],
                type: 'pie'
            }];
              
            var layout = {
                height: 400,
                width: 500
            };
              
            Plotly.newPlot('grafica', data, layout);
        }
    })
}
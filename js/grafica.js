function verGrafica() {

    $.ajax({
        url: 'controllers/controller_getGrafica.php',
        success: function(data) {

            graphicData = JSON.parse(data)

            var datos = [{
                values: [],
                labels: [],
                type: 'pie'
            }];

            for(value of graphicData) {
                datos[0].labels.push(value['nombre'])
                datos[0].values.push(value['cantidad'])
            }
            console.log(datos)
            var layout = {
                height: 400,
                width: 500
            };
              
            Plotly.newPlot('grafica', datos, layout);
        }
    })
}
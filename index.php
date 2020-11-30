<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda | Cutsie Girl</title>
    <!--Links-->
    <!--CSS-->
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos2.css">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
    crossorigin="anonymous">
    <!--Fin Links-->
</head>

<body>
    <!--Header-->
    <h1>Encabezado</h1>
    <!--Fin Header-->
    <?php
    if (!isset($mod))
        $mod = 'main';
    switch ($mod) {
        case 'main': //Página Principal
            include "views/main.php";
            break;
        case 'store':
            include "";
            break;
    }
    ?>
    <!--Footer-->
    <h1>Pie de página</h1>
    <!--Fin Footer-->
</body>

</html>
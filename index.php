<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda | Cutsie Girl</title>
    <!--Links-->
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos2.css">
    <!--Fin Links-->
</head>
<body>
    <!--Header-->
    
    <!--Fin Header-->
    <?php
        if(!isset($mod))
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
    
    <!--Fin Footer-->
</body>
</html>
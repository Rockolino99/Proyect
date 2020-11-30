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
    <!--Favicon-->
    <link rel="icon" href="images/logo.jpg" type="image/gif" sizes="16x16">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--Fin Links-->
</head>

<body>
    <!--Header (Encabezado)-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(90deg, rgb(10%, 40%, 85%), rgb(80%, 20%, 40%));">
        <a class="navbar-brand" href="index.php"><img src="" width="70px"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php" style="color: white;">INICIO<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: white;">
                        TIENDA
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="index.php?mod="><img src="" width="50px"></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?mod="><img src="" width="50px"></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?mod="><img src="" width="50px"></a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="index.php?mod=" style="color: white;">ACERCA DE </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="index.php?mod="style="color: white;">FILOSOFIA</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="index.php?mod="style="color: white;">CONTACTO</a>
                </li>
                <!--Esta opción se quita o se deja dependiendo de la rúbrica-->
                <li class="nav-item active">
                    <a class="nav-link active" href="index.php?mod="style="color: white;">BLOG</a>
                </li>
            </ul>
        </div>
    </nav>
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
    <!--Footer (Pie de pagina)-->
    <!--Modificar el color de las letras, intente modificar pero no se reflejaban los cambios :(-->
    <footer class="pie-de-pagina">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                <!--aqui hay que meter un mapa de la ubicación-->
                    <img src="images/imagen.png" style="width:130px;">
                    <h6 class="text-muted">
                    Zaragoza #225, Centro
                    Aguascalientes, Ags, mx.<br>
                    </h6>
                </div>
                <div class="col-xs-12 col-md-6 text-right">
                    <div class="pull-right">
                        <h6 class="text-muted lead">ENCUENTRANOS EN LAS REDES</h6>

                            <div class="redes-footer">
                                <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                            </div>
                    </div>
                    <div class="row">
                        <p class="text-muted small text-center">Cutsie Girl&reg;
                            <br> Todos los derechos reservados.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!--Fin Footer-->
    <!--Scripts de Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f8978717f6.js" crossorigin="anonymous"></script>
</body>

</html>
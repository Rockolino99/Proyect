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
                <li>
                    <a href="index.php"><img src="images/loguito.png" width="60px" alt=""></a>
                </li>
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
            <!--link de LogIn-->
            <div class="nav-item active">
                    <a class="nav-link active" href="index.php?mod=" style="color: white;"><i class="fas fa-user"></i><b>  LOG IN</b></a>
            </div>
            
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
    <footer class="pie-de-pagina">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="titulosPiePag">LOCALÍZANOS</h5>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3702.255485442629!2d-102.29483538599813!3d21.88623548554018!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8429ee644fd3139d%3A0x586a90fb8f831491!2sZaragoza%20225%2C%20Zona%20Centro%2C%2020000%20Aguascalientes%2C%20Ags.!5e0!3m2!1sen!2smx!4v1606773540684!5m2!1sen!2smx" width="300" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    <h6 style="color:rgb(236, 231, 231); text-align: left; margin: 15px;">
                        Zaragoza #225, Centro<br>Aguascalientes, Ags, mx.
                    </h6>
                </div>
                <div class="col-md-4">
                <h5 class="titulosPiePag">CUTSIE INFO</h5>
                    <ul>
                        <li><a href="">Envíos y devoluciones</a></li>
                        <li><a href="">Nuestras políticas</a></li>
                        <li><a href="">Metodos de pago</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div class="pull-right">
                        <h5 class="titulosPiePag">ENCUÉNTRANOS EN LAS REDES</h5>
                            <div class="redes-footer">
                                <a href="https://www.facebook.com/Cutsiegirl" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                            </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p style="color:rgb(236, 231, 231); text-align: center; font-size: small;">Cutsie Girl&reg;
                        <br> Todos los derechos reservados.
                    </p>
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
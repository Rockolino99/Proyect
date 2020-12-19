<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda | Cutsie Girl</title>
    <!--Links-->
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <!--CSS-->
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos2.css">
    <!--Sweet Alert-->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--Favicon-->
    <link rel="icon" href="images/logo.jpg" type="image/gif" sizes="16x16">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--AJAX JQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <!--JS-->
    <script src="js/login.js"></script>
    <script src="js/tienda.js"></script>
    <script src="js/contacto.js"></script>
    <!--AnimateCSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <!--Fin Links-->
</head>

<body>
    <!--Header (Encabezado)-->
    <nav class="navbar navbar-expand-lg navbar-light" style="background: linear-gradient(90deg, rgb(10%, 40%, 85%), rgb(80%, 20%, 40%)); top:0; width:100%; position: sticky; z-index: 1">
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
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="z-index: 0;">
                    <?php $admin = isset($_SESSION['correo'] ) && $_SESSION['correo'] == "admin@cutsiegirl.mx" ? base64_encode($_SESSION['correo']) : base64_encode('0') ?>
                        <a class="dropdown-item" href="index.php?mod=store&cat=1&<?php echo $admin; ?>" style="text-align: center;">INVIERNO</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?mod=store&cat=2" style="text-align: center;">VESTIDOS</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="index.php?mod=store&cat=3" style="text-align: center;">DISNEY</a>
                    </div>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="index.php?mod=acercade" style="color: white;">ACERCA DE </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="index.php?mod=contactanos" style="color: white;">CONTÁCTANOS</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link active" href="index.php?mod=ayuda" style="color: white;">AYUDA</a>
                </li>
            </ul>
            <?php
            if (isset($_SESSION['idUsuario'])) {
            ?>
                <a href="php/logout.php" style="color: white;" class="nav-link active"><b><?php echo strtoupper($_SESSION['nombreUsuario']) ?></b> <i class="fas fa-sign-out-alt"></i></a>
            <?php
            } else {
                session_destroy();
            ?>
                <!--Login-->
                <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="dropdown order-1">
                        <a class="nav-link active" data-toggle="dropdown" style="color: white;"><i class="fas fa-user"></i><b> INICIAR SESIÓN</b></a>
                        <ul class="dropdown-menu dropdown-menu-right mt-2">
                            <li class="px-3 py-2">
                                <form class="form" role="form" id="formularioLogin">
                                    <div class="form-group">
                                        <input name="usuario" placeholder="Correo" class="form-control form-control-sm" type="email" id="correoLogin"
                                        value="<?php if(isset($_COOKIE['usuario'])) echo $_COOKIE['usuario']; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input name="contrasena" placeholder="Contraseña" class="form-control form-control-sm" type="password" id="contrasena"
                                        value="<?php if(isset($_COOKIE['contrasena'])) echo $_COOKIE['contrasena']; ?>" required>
                                    </div>
                                    <!--Captcha-->
                                    <label for="captcha">Ingresa Captcha</label>
                                    <img src="captcha.php" alt="CAPTCHA" class="captcha-image"><i class="fas fa-redo refresh-captcha" onclick="newCaptcha()"></i>
                                    <div class="form-group">
                                        <input name="captcha_challenge" placeholder="Captcha" class="form-control form-control-sm" type="text" id="captcha" pattern="[A-Z]{6}">
                                    </div>
                                    <!--Fin Captcha-->
                                    <input type="checkbox" name="remember" id="remember"><label for="remember">&nbsp;Recuérdame</label>
                                    <div class="form-group text-center">
                                        <button type="button" class="btn btn-primary" name="entrar" onclick="login()">Entrar</button><!--onclick="login()"-->
                                    </div>
                                    <br>
                                    <div class="form-group text-center">
                                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalRegistro">Registrarse</button>
                                    </div>
                                    <div class="form-group">
                                        <a href="#" data-toggle="modal" data-target="#modalReestablecer" target="_blank" style="color: blue; text-align: center;">¿Olvidaste tu contraseña? Restablécela aquí</a>
                                    </div>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            <?php
            }
            ?>
        </div>
    </nav>
    <!--//Modal registro-->
    <div id="modalRegistro" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Registro</h3>
                    <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form" role="form" id="formularioRegistro">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nombre">Nombre:</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="apat">Apellido Paterno:</label>
                                    <input type="text" class="form-control" id="apat" placeholder="A. Paterno" name="apat" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="amat">Apellido Materno:</label>
                                    <input type="text" class="form-control" id="amat" placeholder="A. Materno" name="amat" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="correo" placeholder="Correo Electrónico" name="correo" required>
                        </div>
                        <div class="form-group">
                            <label for="user">Dirección:</label>
                            <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pass">Contraseña:</label>
                                    <input type="password" class="form-control" id="pass" placeholder="Contraseña" name="pass" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pass">Confirma Contraseña:</label>
                                    <input type="password" class="form-control" id="pass2" placeholder="Repite Tu Contraseña" name="pass2" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="">
                                <button type="button" class="btn btn-primary btn-block" name="enviar" id="btnRegistrar" onclick="registro()">Enviar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Fin Modal registro-->
    <!--Modal Reestablecer Contraseña-->
    <div id="modalReestablecer" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Reestablecer Contraseña</h3>
                    <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <form class="form" role="form" id="form_RestablecerPass">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <label for="correoRestablecer">Correo electrónico:</label>
                                <input type="text" class="form-control" id="correoRestablecer" placeholder="Correo Electrónico">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col">
                                <label for="passRestablecer1">Contraseña:</label>
                                <input type="password" class="form-control" id="passReestablecer1" placeholder="Contraseña">
                            </div>
                            <div class="col">
                                <label for="passRestablecer2">Repetir contraseña:</label>
                                <input type="password" class="form-control" id="passReestablecer2" placeholder="Repetir Contraseña">
                            </div>
                        </div>
                        <br><br>
                        <center>
                            <button type="button" class="btn btn-primary" onclick="reestablecerPass()">Cambiar contraseña</button>
                        </center>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Fin Header-->
    <?php
    $mod = (isset($_GET['mod'])) ? $_GET['mod'] : "main";
    switch ($mod) {
        case 'main': //Página Principal
            include "views/main.php";
            break;
        case 'store': //TiendaInvierno
            include "views/tienda.php";
            break;
        case 'acercade': //Acerca de
            include "views/acercade.php";
            break;
        case 'contactanos': //Contactanos
            include "views/contactanos.php";
            break;
        case 'ayuda': //Ayuda
            include "views/ayuda.php";
            break;
        case 'restablecerPass': //Restablecer contraseña
            include "views/password.php";
    }
    ?>
    <!--Footer (Pie de pagina)-->
    <footer class="pie-de-pagina">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="titulosPiePag">LOCALÍZANOS</h5>
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
                    <br><br>
                    <p style="color:rgb(236, 231, 231); text-align: center; font-size: small;">Cutsie Girl&reg;
                        <br> Todos los derechos reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!--Fin Footer-->
    <!--Scripts de Bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f8978717f6.js" crossorigin="anonymous"></script>
</body>

</html>
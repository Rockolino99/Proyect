<?php

if(isset($_POST['enviarP'])){
    if(!empty($_POST['optradio']) && !empty($_POST['optradio1']) && !empty($_POST['optradio2']) && isset($_SESSION['correo']) && $_SESSION['correo'] != 'admin@cutsiegirl.mx' ){
        $correo=$_SESSION['correo'];
        $asunto='Cupón de regalo';
        $msj="<h2><center>Gracias por registrarte en CutsieGirl</center></h2><h3><center>¡Obten de regalo un cupón de $100 de descuento en tu proxima compra!</center></h3>";
        $header ="From: cutsiegirl@gmail.com" . "\r\n";
        $header.="Reply-To: cutsiegirl@gmail.com" . "\r\n";
        //$header.= "X-Mailer: PHP/" . phpversion();
        $header.= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $mail = @mail($correo,$asunto,$msj,$header);          
    }
}
?>

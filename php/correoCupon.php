<?php

if(isset($_POST['suscribirme'])){
    if(!empty($_POST['email1'])){
        $email1=$_POST['email1'];
        $asunto='Cupón por suscripcion';
        $msj="<h3><center>¡Felicidades obtuviste un cupón del 40%OFF</center></h3>";
        $msj.='
        <center><img src="http://cutsiegirl.store/images/CUPONES/propuestas%20a%20modificar/Cupon%2040off.png"></center>'; 
        $header ="From: cutsiegirl@gmail.com" . "\r\n";
        $header.="Reply-To: cutsiegirl@gmail.com" . "\r\n";
        //$header.= "X-Mailer: PHP/" . phpversion();
        $header.= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $mail = @mail($email1,$asunto,$msj,$header);  
        if($mail){
            echo"<script>
                swal({
                    icon: 'success',
                    title: 'FELICIDADES',
                    text: 'Cupón enviado exitosamente!',
                    buttons: false,
                    timer: 4000
                })
            </script>";
        }else{
            echo"<script>
                swal({
                    icon: 'error',
                    title: 'ERROR',
                    text: 'Error en  el envio de su cupón!',
                    buttons: false,
                    timer: 4000
                })
            </script>";
        }
    }
}

?>

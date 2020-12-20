<?php

if(isset($_POST['enviar'])){
    if(!empty($_POST['nombre']) && !empty($_POST['apat']) && !empty($_POST['amat']) && !empty($_POST['correo']) && !empty($_POST['direccion']) && !empty($_POST['pass']) && !empty($_POST['pass2']) ){
        $name=$_POST['nombre'];
        $correo=$_POST['correo'];
        $asunto='Cupón de regalo';
        $msj="<h2><center>Gracias por registrarte en CutsieGirl</center></h2><h3><center>¡Obten de regalo un cupón de $100 de descuento en tu proxima compra!</center></h3>";
        $msj.='
        <center><img src="http://cutsiegirl.store/images/CUPONES/propuestas%20a%20modificar/Cupon%2040off.png"></center>'; 
        $header ="From: cutsiegirl@gmail.com" . "\r\n";
        $header.="Reply-To: cutsiegirl@gmail.com" . "\r\n";
        $header.= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $mail = @mail($correo,$asunto,$msj,$header);  
    }
    if($mail){
        echo"<script>
            swal({
                icon: 'success',
                title: 'HECHO',
                text: 'Mensaje enviado exitosamente!',
                buttons: false,
                timer: 4000
            })
        </script>";
    }else{
        echo"<script>
            swal({
                icon: 'error',
                title: 'ERROR',
                text: 'Error en  el envio de su mensaje!',
                buttons: false,
                timer: 4000
            })
        </script>";
    }
}
?>

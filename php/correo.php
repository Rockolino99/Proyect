<?php

if(isset($_POST['enviarContact'])){
    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['telefono']) && !empty($_POST['mensaje']) ){
        $name=$_POST['name'];
        $asunto='CutsieGirl';
        $msj=$name . ' su solicitud esta siendo procesada.';
        $email=$_POST['email'];
        $telefono=$_POST['telefono'];
        $mensaje=$_POST['mensaje'];
        $header ="From: cutsiegirl@gmail.com" . "\r\n";
        $header ="Reply-To: cutsiegirl@gmail.com" . "\r\n";
        $header = "X-Mailer: PHP/" . phpversion();
        $mail = @mail($email,$asunto,$msj,$header);  
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
}

?>

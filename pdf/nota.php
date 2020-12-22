<?php
date_default_timezone_set('America/Mexico_City');

include_once '../connection/Object_Connection.php';
include_once '../models/Object_Carrito.php';

$database = new Database();
$db = $database->getConnection();

$carrito = new Carrito($db);

$stmt = $carrito->getCarrito();

$nombre_cliente=$_GET['nombre'];
$direccion = str_replace('_', '#', $_GET['direccion']);
$no_nota=$_GET['idNota'];
$modo_pago = $_GET['modo'];
$subtotal=$_GET['subtotal'];
$gastos_envio=$_GET['envio'];
$cupon=$_GET['cupon'];
$iva=$_GET['iva'];
$total_pagar="800";


$cantidad=array("15","12","70");
$nombre_producto=array("mamadas","mamadas2","mamadas3");
$precio_producto=array("450.00","250.00","700.00");
$total_por_prenda=array("8000.00","2400.00","9000.00");



define('FPDF_FONTPATH','.');
require ("fpdf/fpdf.php");


$fpdf=new FPDF('P','pt','A4');
$fpdf->AddFont('Rajdhani-Bold','','rajdhani-bold.php');
$fpdf->AddPage();
$fpdf->SetFont('Rajdhani-Bold','',14);
$fpdf->SetTextColor(64,81,69);
$fpdf->Image('../images/nota.jpg',0,0,603,850);

//Text(y, x,":v") 
$fpdf ->Text(400,220,"FECHA: ");
$fpdf ->Text(445,220,date("d/m/Y"));

$fpdf ->Text(60,220,$nombre_cliente);
//$fpdf ->Text(145,220,$ap_paterno);
//$fpdf ->Text(220,220,$ap_materno);
$fpdf ->Text(60,250,$direccion);
$fpdf ->Text(494,250.5,$no_nota);

//Articulo
$y=390;
while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $fpdf ->Text(70, $y, $row['cantidad']);
    $fpdf ->Text(150, $y, $row['nombre']);
    $fpdf ->Text(250, $y, $row['precio']);
    $fpdf ->Text(492, $y, $row['cantidad']*$row['precio']);
    $y+=40;
}

$fpdf ->Text(174,633,$modo_pago);

$cupon = (-1)*(40/100)*$subtotal;//Modificar cupón

$total_pagar=$iva+$subtotal+$gastos_envio+$cupon;

$fpdf ->Text(492,633,'$'.$subtotal);

$fpdf ->Text(492,664,'$'.$gastos_envio);

$fpdf ->Text(492,695,'$'.$cupon);

$fpdf ->Text(492,726,'$'.$iva);

$fpdf ->Text(492,757,'$'.$total_pagar);

$fpdf ->OutPut();


if(isset($_POST['continuar'])){
    
    $correo=$_SESSION['correo'];
    $asunto='Nota de compra';
    $msj="<h2><center>Gracias por comprar en CutsieGirl</center>";
    $msj.=$fpdf;
    $header.="Reply-To: cutsiegirl@gmail.com" . "\r\n";
    //$header.= "X-Mailer: PHP/" . phpversion();
    $header.= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $mail = @mail($correo,$asunto,$msj,$header);      
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


?>
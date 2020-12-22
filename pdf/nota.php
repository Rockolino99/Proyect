<?php
date_default_timezone_set('America/Mexico_City');
//AddPage(orientation[PORTRAIT, LADSCAPE], tamaño [A3, A4, A5, LETTER, LEGAL]),
//SetFont[tipo(COURIER, HELVETICA, ARIAL, TIMES, SYMBOL, ZAPDINGBATS), estilo[normal, B, I, U], tamaño],
//Cell(ancho, alto, texto, bordes, ?, alineación, rellenar, link)
//OutPut(destino[I, D, F, S], nombre_archivo, utf-8)
$nombre_cliente="GEORGINA";
$direccion="CALLE CHAPULINES #412";
$no_nota="45";
$modo_pago="Tarjeta de crédito";
$subtotal=0;
$gastos_envio="1500";
$cupon="CUTSIECHS";
$iva=0;
$total_pagar="800";


$cantidad=array("15","12","70");
$nombre_producto=array("mamadas","mamadas2","mamadas3");
$precio_producto=array("450.00","250.00","700.00");
$total_por_prenda=array("8000.00","2400.00","9000.00");



define('FPDF_FONTPATH','.');
require ("fpdf/fpdf.php");
//require("../fpdf/fpdf.php");

$fpdf=new FPDF('P','pt','A4');
$fpdf->AddFont('Rajdhani-Bold','','rajdhani-bold.php');
$fpdf->AddPage();
$fpdf->SetFont('Rajdhani-Bold','',14);
$fpdf->SetTextColor(64,81,69);
$fpdf->Image('images/nota.jpg',0,0,603,850);

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
foreach($cantidad as $nombre){
    $fpdf ->Text(70,$y,$nombre);
    $y+=40;
}
$y=390;
foreach($nombre_producto as $nombre){
    $fpdf ->Text(150,$y,$nombre);
    $y+=40;
}
$y=390;
foreach($precio_producto as $nombre){
    $fpdf ->Text(250,$y,'$'.$nombre);
    $y+=40;
}
$y=390;
$parcial;
for($i=0; $i<sizeof($nombre_producto);$i++){
    $parcial=$cantidad[$i]*$precio_producto[$i];
    $fpdf ->Text(492,$y,'$'.$parcial);
    $y+=40;
    $subtotal+=$parcial;
}
$fpdf ->Text(174,633,$modo_pago);

$iva=$subtotal*1.16;
$total_pagar=$iva+$subtotal;

$fpdf ->Text(492,633,'$'.$subtotal);

//$fpdf ->Text(492,664,'$'.$gastos_envio);

//$fpdf ->Text(492,695,'$'.$cupon);

$fpdf ->Text(492,726,'$'.$iva);

$fpdf ->Text(492,757,'$'.$total_pagar);

$fpdf ->OutPut();

?>
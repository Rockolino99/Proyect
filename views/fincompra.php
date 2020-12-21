<head>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f8978717f6.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<?php
include_once '../connection/Object_Connection.php';
include_once '../models/Object_Carrito.php';

$database = new Database();
$db = $database->getConnection();

$carrito = new Carrito($db);

$stmt = $carrito->getCarrito();

if ($stmt->rowCount() > 0) {
    //idCarrito, idInventario, idCategoria
    //nombre, precio, imagen
    $subtotal = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="articulo">
            <div class="card">
                <div class="card-body">
                <img class="card-img-top" src="<?php echo $row['imagen'] ?>" alt="Card image cap" style="height: 150px; width: 80px; float: left;">
                <button type="button" class="close font-weight-dark" onclick="dropCart(<?php echo $row['idCarrito'] ?>)">×</button>
                <br>
                <h5 class="card-title" style="text-align: center;"><?php echo "$row[nombre]"; ?></h5>
                <br>
                <h5 class="card-title" style="text-align: center;"><?php echo "$$row[precio]<br>$row[cantidad] unidad(es)"; ?></h5>
                </div>
            </div>
        </div>
        <!--Modal Vista previa-->
        <!--Vista previa: nombre, marca, descripcion, imagen, talla, color, existencia, precio-->
    <?php
    $subtotal += ($row['precio'] * $row['cantidad']);
    }?>
    <div class="titulosPags">
        <span style="font-size: 25px;">SUBTOTAL: $<?php echo $subtotal?></span>
    </div>
    <?php
} else {
    ?>
    <div class="titulosPags">
        <span style="font-size: 25px;">CARRITO VACÍO</span>
    </div>
<?php
}
?>


<!-- código a copiar-->
    <form action="">
        <h2>Detalles de la tarjeta.</h2>
    <div id="md1">
        <p>Selecciona tu Tarjeta.</p>
        <input type="radio" name="type" id="visa">
        <label for="visa"><img src="../images/visa.png" alt="" height="25" width="40">VISA</label>
        <input type="radio" name="type" id="am">
        <label for="am"><img src="../images/amex.png" alt="" width="40" height="35">AmEx</label>
        <input type="radio" name="type" id="mast">
        <label for="mast"><img src="../images/ms.png" alt="" width="40" height="25">MasterCard</label>
    </div><br>
    <div>
        <label for="number">Número de Tarjeta. </label>
        <input class="a" type="number" id="number" name="number">
    </div><br>
    <div>
        <label for="security">Código de Seguridad. </label>
        <input class="a" type="text" name="security" id="security">
    </div><br>
    <div>
        <label for="name">Nombre del Propietario.</label>
        <input class="a" type="text" name="name" id="name" placeholder="Nombre exacto de la tarjeta">
    </div>
    </form>



<h1>Pago en Oxxo</h1>
<h3>Muestra el siguiente código</h3>
<img src="../images/codigoqr.png" alt="">

<!--Gastos de envío-->

<?php
    $costoenvio =0;
    if($subtotal > 2000){
        $costoenvio=0;
    }else{
        $costoenvio=200;
    }
    $total= $costoenvio + $subtotal;
?>

<h5>Si tienes un cupón, ingresa su código aquí</h5>

<input type="text" name="cupon">


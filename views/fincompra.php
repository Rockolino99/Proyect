<body onload="getCartFinal()">
    <div id="productosCarritoFinal"></div>
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

    <!--Gastos de envío esto va al controlador-->

    <?php
    //temporal
    $subtotal = 50;
    //fin temporal
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

</body>
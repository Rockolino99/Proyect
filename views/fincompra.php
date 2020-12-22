
<div class="titulosPags">
    <span style="font-size: 25px;">FINALIZAR COMPRA</span>
</div>

<body onload="getCartFinal()">
    <div class="contentfinCompra">
    <div id="productosCarritoFinal">
    <!-- código a copiar-->
        <form action="" style="width:50%;" method="post">

            <h5>Método de pago</h5>
            <nav style="width:90%;">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tarjeta de crédito</a>
                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Pago en efectivo</a>
                </div>
            </nav>
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div id="md1">
                        <p>Selecciona tu tarjeta</p>   
                        <input type="radio" name="type" id="visa">
                        <label for="visa"><img src="images/visa.png" alt="" height="25" width="40"></label>
                        <input type="radio" name="type" id="am">
                        <label for="am"><img src="images/amex.png" alt="" width="40" height="35"></label>
                        <input type="radio" name="type" id="mast">
                        <label for="mast"><img src="images/ms.png" alt="" width="40" height="25"></label>
                    </div><br>
                    <div>
                        <label for="number">Número de tarjeta</label>
                        <input class="a" type="number" id="number" name="number" placeholder="1234-5678-9012-3456">       
                    </div><br>
                    <div>
                        <label for="name">Nombre del titular</label>
                        <input class="a" type="text" name="name" id="name" placeholder="Como aparece en la tarjeta">
                    </div><br>
                    <div>
                        <label for="security">Código de seguridad</label>
                        <input class="a" type="text" name="security" id="security" placeholder="***********">
                    </div>                
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <p>Selecciona la sucursal</p>   
                    <input type="radio" name="type" id="oxxo">
                    <label for="oxxo"><img src="images/oxxo.jpg" alt="" height="35" width="40"></label>
                    <input type="radio" name="type" id="farmacia" disabled>
                    <label for="farmacia"><img src="images/farmacia.jpg" alt="" height="25" width="55"></label>
                    <input type="radio" name="type" id="benavides" disabled>
                    <label for="benavides"><img src="images/benavides.PNG" alt="" height="25" width="55"></label>
                    <div style="padding-left:10px; padding-rigth:10px">
                        <p>1. Menciona al empleado que quieres pagar un servicio de CutsieGirl.</p>
                        <span>2. Muestrale este codigo QR al cajero para que lo escanee y listo.</span>
                    </div>
                    <img src="images/codigoqr.png" alt="">
                </div>
            </div>

            <!--Gastos de envío esto va al controlador-->
            
            <div>
            <p><b>¿Tienes un cupón de descuento? <br> Ingresa su código aquí</p></b>
            <input type="text" name="cupon" placeholder="CUTSIE-XXXX">
            </div><br><br>
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>

    </div>

    </div>
    

</body>
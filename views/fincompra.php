
<div class="titulosPags">
    <span style="font-size: 25px;">FINALIZAR COMPRA</span>
</div>

<body onload="getCartFinal(), updateCarrito()">
    <div class="contentfinCompra">
    <div id="productosCarritoFinal">
    <!-- código a copiar-->
        <form style="width:50%;">
            <h5>Direccion de envio</h5>
            <small  class="form-text text-muted" >Todo los campos son obligatorios</small>
           <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="apat">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombreCompleto" placeholder="Nombre completo" name="nombreCompleto" required>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="amat">Telefono</label>
                            <input type="text" class="form-control" id="telefono" placeholder="Telefono" name="telefono" required>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="user">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" placeholder="Dirección" name="direccion" required>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="pass">Ciudad</label>
                                <input type="text" class="form-control" id="ciudad" placeholder="Ciudad" name="ciudad" required>
                      </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="pass">Código Postal</label>
                                    <input type="number" class="form-control" id="cp" placeholder="C.P" name="cp" required>
                                </div>
                            </div>
                        </div>

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
                        <input type="radio" name="type" id="visa" value="tarjeta">
                        <label for="visa"><img src="images/visa.png" alt="" height="25" width="40"></label>
                        <input type="radio" name="type" id="am" value="tarjeta">
                        <label for="am"><img src="images/amex.png" alt="" width="40" height="35"></label>
                        <input type="radio" name="type" id="mast" value="tarjeta">
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
                    <input type="radio" name="type" id="oxxo" value="oxxo">
                    <label for="oxxo"><img src="images/oxxo.jpg" alt="" height="35" width="40"></label>
                    <input type="radio" name="type" id="farmacia" disabled>
                    <label for="farmacia"><img src="images/farmacia.jpg" alt="" height="25" width="55"></label>
                    <input type="radio" name="type" id="benavides" disabled>
                    <label for="benavides"><img src="images/benavides.PNG" alt="" height="25" width="55"></label>
                    <div style="padding-left:10px; padding-right:10px">
                        <p>1. Menciona al empleado que quieres pagar un servicio de CutsieGirl.</p>
                        <span>2. Muestrale este código QR al cajero para que lo escanee y listo.</span>
                    </div>
                    <center><img src="images/codigoqr.png" alt=""></center>
                </div>
            </div>

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
            <div>
                <p><b>¿Tienes un cupón de descuento? <br> Ingresa su código aquí</p></b>
                <input type="text" name="cupon" placeholder="CUTSIEXXXX">   
            </div><br><br>
            <button type="button" class="btn btn-primary"onclick="finalizarCompra()">Continuar</button>
        </form>

    </div>

    </div>
            

<?php
include_once '../connection/Object_Connection.php';
include_once '../models/Object_Articulo.php';

$database = new Database();
$db = $database->getConnection();

$articulo = new Articulo($db);

$articulo->idCategoria = $_POST['categoria'];
$stmt = $articulo->getArticulo();

if ($stmt->rowCount() > 0) {
    //Card: nombre, marca, descripcion, imagen, talla, color, existencia
    //Venta: idInventario, precio, idCategoria
    //idArticulo
    $i = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <div class="col-3">
            <div class="card" style="width: 18rem; height: 100%; margin: auto;">
                <div class="articulo">
                    <img class="card-img-top imagen" src="<?php echo $row['imagen'] ?>" alt="Card image cap">
                    <div class="overlay">
                        <div class="text" data-toggle="modal" data-target="#modalVistaPrevia<?php echo $i; ?>">Vista Previa</div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;"><?php echo "$row[nombre] - $$row[precio]"; ?></h5>
                    <?php if (($_POST['admin']) == 'admin@cutsiegirl.mx') {
                        $admin = "'".$_POST['admin']."'"?>
                        <div style="display: flex; justify-content: space-between;">
                            <button class="btn btn-info">Editar</button>
                            <button class="btn btn-danger" onclick="deleteArticulo(<?php echo $row['idArticulo']?>,
                                <?php echo $row['idInventario']?>, <?php echo $_POST['categoria']?>, <?php echo $admin; ?>)">Eliminar</button>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--Modal Vista previa-->
        <!--Vista previa: nombre, marca, descripcion, imagen, talla, color, existencia, precio-->
        <div id="modalVistaPrevia<?php echo $i++; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content cafe" style="background: linear-gradient(90deg, #F3D6FA, #D6D6FA);">
                    <div class="modal-header">
                        <h3 class="cafe">Vista Previa</h3>
                        <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="vistaPrevia">
                            <div class="col-5">
                                <img src="<?php echo $row['imagen'] ?>" style="float: left; width: 100%;">
                            </div>
                            <div class="vista2">
                                <div class="nombreArticulo"><?php echo $row['nombre']; ?></div><br>
                                <div class="nombreAPrecio">Precio: $<?php echo $row['precio']; ?></div><br>
                                <div class="nombreMarca">Marca: <?php echo $row['marca']; ?></div><br>
                                <div class="nombreTalla">Talla: <?php echo $row['talla']; ?></div><br>
                                <div class="nombreColor">Color: <?php echo $row['color']; ?></div><br>
                                <div class="nombreCantidad"><label for="cantidadVP" >Cantidad:</label></div>
                                <input type="number" class="form-control" id="cantidadVP" placeholder="Cantidad" value="1" required
                                onchange="validaCantidad(this, $(this).val(),<?php echo $row['existencia']; ?>)" onkeyup="validaCantidad(this, $(this).val(),<?php echo $row['existencia']; ?>)"><br>
                                <div class="nombreDesc"> <?php echo $row['descripcion']; ?></div><br>
                                <button class="btn btn-primary" style="background-color: saddlebrown; border-color:saddlebrown; float:right" onclick="/*addToCart()*/">Añadir al carrito</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Fin Modal Vista previa-->
    <?php
    }
} else {
    ?>
    <div class="titulosPags">
        <span style="font-size: 25px;">NO HAY ARTICULOS EN ESTA CATEGORIA</span>
    </div>
<?php
}
?>

<script src="js/tienda.js"></script>
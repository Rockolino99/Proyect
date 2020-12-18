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
    $i = 0;
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
        <div class="col-3">
            <div class="card" style="width: 18rem; height: 100%; border: 1px solid blue; margin: auto;">
                <div class="articulo">
                    <img class="card-img-top imagen" src="<?php echo $row['imagen'] ?>" alt="Card image cap" style="widtd: 100%">
                    <!--<button class="btn btn-primary btnVistaPrevia" style="margin-left: 30%; margin-right: 30%;" data-toggle="modal" data-target="#modalVistaPrevia<?php echo $i; ?>">Vista Previa</button>-->
                    <div class="overlay">
                        <div class="text" data-toggle="modal" data-target="#modalVistaPrevia<?php echo $i; ?>" >Vista Previa</div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center;"><?php echo "$row[nombre] - $$row[precio]"; ?></h5>
                    <p class="card-text"><?php echo $row['descripcion']; ?></p>
                </div>
            </div>
        </div>
        <!--Modal Vista previa-->
        <div id="modalVistaPrevia<?php echo $i++; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Vista Previa</h3>
                        <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-6">
                            <img src="<?php echo $row['imagen'] ?>" style="float: left; width: 100%;">
                        </div>
                        <div class="col-6" style="margin-left: 50px;">
                            <?php echo $row['nombre']; ?>
                            <button class="btn btn-primary" onclick="/*addToCart()*/">Añadir al carrito</button>
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
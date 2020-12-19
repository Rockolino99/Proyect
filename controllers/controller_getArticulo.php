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
                <div class="modal-content">
                    <div class="modal-header">
                        <h3>Vista Previa</h3>
                        <button type="button" class="close font-weight-light" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="col-6">
                            <img src="<?php echo $row['imagen'] ?>" style="float: left; width: 100%;">
                        </div>
                        <div class="col-10">
                            <div>
                                <div class="nombreArticulo"><?php echo $row['nombre']; ?></div>
                                <div class="nombreAPrecio"><?php echo $row['precio']; ?></div>
                                <div class="nombreMarca"><?php echo $row['marca']; ?></div>
                                <div class="nombreDesc"><?php echo $row['descripcion']; ?></div>
                                <div class="nombreTalla"><?php echo $row['talla']; ?></div>
                                <div class="nombreColor"><?php echo $row['color']; ?></div>
                                <div class="nombreExistencia"><?php echo $row['existencia']; ?></div>
                                <button class="btn btn-primary" onclick="/*addToCart()*/">Añadir al carrito</button>
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
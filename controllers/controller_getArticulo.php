<?php
include_once '../connection/Object_Connection.php';
include_once '../models/Object_Articulo.php';

$database = new Database();
$db = $database->getConnection();

$articulo = new Articulo($db);

$articulo->idCategoria = $_POST['categoria'];
$stmt = $articulo->getArticulo();

if($stmt->rowCount() > 0) {
    /*
    idArticulo, nombre, marca, descripcion, idProveedor, idCategoria,
    idInventario, existencia, talla, precio, imagen, color
    */
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {?>
        <div class="col-4 articulo">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="<?php echo $row['imagen'] ?>" alt="Card image cap" style="height: 200px">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nombre']; ?></h5> 
                    <p class="card-text"> <?php echo $row['marca']?></p>
                    <p class="card-text"><?php echo $row['descripcion']; ?></p>
                    <a href="#" class="btn btn-primary">Añadir al carrito</a> 
                </div>
            </div>
        </div>
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
<!--
    echo "<tr>";
    echo "<td>$row[idArticulo]</td>";
    echo "<td>$row[nombre]</td>";
    echo "<td>$row[marca]</td>";
    echo "<td>$row[descripcion]</td>";
    echo "<td>$row[idProveedor]</td>";
    echo "<td>$row[idCategoria]</td>";
    echo "</tr>";
-->
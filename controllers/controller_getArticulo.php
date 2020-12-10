<?php
include_once '../connection/Object_Connection.php';
include_once '../models/Object_Articulo.php';

$database = new Database();
$db = $database->getConnection();

$articulo = new Articulo($db);

$stmt = $articulo->getArticulo();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>$row[idArticulo]</td>";
    echo "<td>$row[nombre]</td>";
    echo "<td>$row[marca]</td>";
    echo "<td>$row[descripcion]</td>";
    echo "<td>$row[idProveedor]</td>";
    echo "<td>$row[idCategoria]</td>";
    echo "</tr>";
}
?>
<div class="container" style="width: 300px; height: 300px; padding: 50px;">
  <div class="card" style="padding: 20px; width: 200px; height: 200px;">
        :v

    </div>
</div>
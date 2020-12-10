<?php
include_once '../connection/Object_Connection.php';
include_once '../models/Object_Articulo.php';

$database = new Database();
$db = $database->getConnection();

$articulo = new Articulo($db);

$stmt = $articulo->getArticulo();
//print_r($stmt->fetchAll());

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    //echo $row['idArticulo'];
    echo "<td>$row[idArticulo]</td>";
    echo "<td>$row[nombre]</td>";
    echo "<td>$row[marca]</td>";
    echo "<td>$row[descripcion]</td>";
    echo "<td>$row[idProveedor]</td>";
    echo "<td>$row[idCategoria]</td>";
    echo "</tr>";
}
?>
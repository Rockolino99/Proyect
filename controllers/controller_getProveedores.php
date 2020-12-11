<?php
include_once '../connection/Object_Connection.php';
include_once '../models/Object_Proveedor.php';

$database = new Database();
$db = $database->getConnection();

$proveedor = new Proveedor($db);

$stmt = $proveedor->getProveedor();
$i = 0;
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <option id="proveedor<?echo $i?>" data-idProveedor="<? echo $row[idProveedor] ?>" data-nombre="<? echo $row[nombre] ?>"></option>
    <?php
}
?>
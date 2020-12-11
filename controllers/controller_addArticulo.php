<?php
include_once '../connection/Object_Connection.php';
include_once '../models/Object_Articulo.php';

$database = new Database();
$db = $database->getConnection();

$articulo = new Articulo($db);

$articulo->nombre = $_POST['nombre'];
$articulo->marca = $_POST['marca'];
$articulo->idProveedor = $_POST['idProveedor'];
$articulo->idCategoria = $_POST['idCategoria'];
$articulo->descripcion = $_POST['descripcion'];

echo $articulo->addArticulo();//retorna ultimo id insertado
?>
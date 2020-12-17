<?php
include_once '../connection/Object_Connection.php';
include_once '../models/Object_Articulo.php';
include_once '../models/Object_Inventario.php';

$database = new Database();
$db = $database->getConnection();

$articulo = new Articulo($db);
$inventario = new Inventario($db);

$articulo->nombre = $_POST['nombre'];
$articulo->marca = $_POST['marca'];
$articulo->descripcion = $_POST['descripcion'];
$articulo->idProveedor = $_POST['idProveedor'];
$articulo->idCategoria = $_POST['idCategoria'];

$idArticulo = $articulo->addArticulo();//retorna ultimo id insertado

$inventario->idArticulo = $idArticulo;
$inventario->existencia = $_POST['existencia'];
$inventario->talla = $_POST['talla'];
$inventario->status = 1;
$inventario->precio = $_POST['precio'];
$inventario->imagen = $_POST['imagen'];
$inventario->color = $_POST['color'];

$inventario->addInventario();

echo $idArticulo;

?>
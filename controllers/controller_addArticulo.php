<?php
include_once '../connection/Object_Connection.php';
include_once '../models/Object_Articulo.php';
include_once '../models/Object_Inventario.php';

//echo "$_POST[nombre] $_POST[marca] $_POST[idProveedor] $_POST[idCategoria] $_POST[descripcion] $_POST[existencia]";

//echo " $_POST[talla] $_POST[precio] $_POST[imagen] $_POST[color]";

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

echo $inventario->addInventario();

?>
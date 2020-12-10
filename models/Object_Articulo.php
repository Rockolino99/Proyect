<?php
include_once "../connection/Object_Connection.php";

class Articulo {
    private $conn;

    public $nombre;
    public $marca;
    public $decripcion;
    public $idProveedor;
    public $idCategoria;

    function __construct($db) {
        $this->conn = $db;
    }
    function addArticulo() {
        $query = "INSERT INTO cutsiegirl.articulo
                  SET
                  nombre = 'a',
                  marca = 'a',
                  descripcion = 'a',
                  idProveedor = 12,
                  idCategoria = 6";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return 5;
    }
}
?>
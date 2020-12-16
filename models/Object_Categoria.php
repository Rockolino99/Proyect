<?php
include_once "../connection/Object_Connection.php";

class Categoria {
    private $conn;

    public $idCategoria;

    public $nombre;

    function __construct($db) {
        $this->conn = $db;
    }

    function getCategoria() {
        $query = "SELECT idCategoria, nombre
                  FROM cutsiegirl.categoria";

        $stmt = $this->conn->prepare($query);
        if($stmt->execute())
            return $stmt;
        else
            return 0;
    }

}
?>
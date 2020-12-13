<?php
include_once "../connection/Object_Connection.php";

class Login {
    private $conn;

    public $correo;
    public $contra;
    public $nombre;
    public $apellido_paterno;
    public $apellido_materno;
    public $direccion;
    public $bloqueo;

    public $idUsuario;

    function __construct($db) {
        $this->conn = $db;
    }

    function setRegistro() {
        
        $query = "SELECT *
                  FROM cutsiegirl.usuario
                  WHERE correo = :correo";

        $stmt = $this->conn->prepare($query);

        $this->correo = htmlspecialchars(strip_tags($this->correo));
        
        $stmt->bindValue(":correo", $this->correo);

        if(!$stmt->execute())
            return 0; 
        else {
            if($stmt->rowCount() > 0)
                echo '¡La dirección de correo electrónico ya está registrada!';
            else {
                $stmt = '';
                $query = "INSERT INTO cutsiegirl.usuario
                          SET nombre = :nombre,
                          apellido_paterno = :apellido_paterno,
                          apellido_materno = :apellido_materno,
                          correo = :correo,
                          contra = :contra,
                          direccion = :direccion,
                          bloqueo = :bloqueo";
                
                $stmt = $this->conn->prepare($query);
                $this->contra = password_hash($this->contra, PASSWORD_BCRYPT);

                $this->correo = htmlspecialchars(strip_tags($this->correo));
                $this->nombre = htmlspecialchars(strip_tags($this->nombre));
                $this->apellido_paterno = htmlspecialchars(strip_tags($this->apellido_paterno));
                $this->apellido_materno = htmlspecialchars(strip_tags($this->apellido_materno));
                $this->contra = htmlspecialchars(strip_tags($this->contra));
                $this->direccion = htmlspecialchars(strip_tags($this->direccion));
                $this->bloqueo = htmlspecialchars(strip_tags($this->bloqueo));
        
                $stmt->bindParam(":nombre", $this->nombre);
                $stmt->bindParam(":apellido_paterno", $this->apellido_paterno);
                $stmt->bindParam(":apellido_materno", $this->apellido_materno);
                $stmt->bindParam(":correo", $this->correo);
                $stmt->bindParam(":contra", $this->contra);
                $stmt->bindParam(":direccion", $this->direccion);
                $stmt->bindParam(":bloqueo", $this->bloqueo);
                
                if($stmt->execute())
                    return "¡Registro exitoso!";
                else
                    return 0;
            }
        }

    }

    function login() {
        $query = "SELECT *
                  FROM cutsiegirl.usuario
                  WHERE correo = :correo";

        $stmt = $this->conn->prepare($query);

        $this->correo = htmlspecialchars(strip_tags($this->correo));
        
        $stmt->bindValue(":correo", $this->correo);

        if(!$stmt->execute())
            return 0;
        else {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!$row)
                return "La cagaste mijo, el correo no está registrado";
            else {
                if(password_verify($this->contra, $row['contra'])) {
                    return "Ingreso exitoso";
                }
                return "Contraseña incorrecta.";
            }
        }
    }
}
?>
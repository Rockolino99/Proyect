<?php

$name = $_POST['usuario'];
$pass = $_POST['contrasena'];

if($_POST['remember'] == 1) {
    setcookie('usuario', $name, time() + 3600);
    setcookie('contrasena', $name, time() + 3600);
    echo "Si";
} else {
    setcookie('usuario', '');
    setcookie('contrasena', '');
    echo "No";
}

?>
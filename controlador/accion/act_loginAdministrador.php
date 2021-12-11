<?php

session_start();


require_once(__DIR__ . "/../mdb/mdbAdministrador.php");

$correo;
$password;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['email'];
    $password = $_POST['password'];
}

if (!$correo || !$password) exit;


$administrador = autenticarAdministrador($correo, $password);

if ($administrador != null) {
    $_SESSION['ID_USUARIO'] = $administrador->getIdAdministrador();
    echo json_encode(true);
} else {
    echo json_encode(false);
}

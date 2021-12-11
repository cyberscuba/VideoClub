<?php

session_start();


require_once(__DIR__ . "/../mdb/mdbCliente.php");

$correo;
$password;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['email'];
    $password = $_POST['password'];
}

if (!$correo || !$password) exit;


$cliente = autenticarCliente($correo, $password);

if ($cliente != null) {
    $_SESSION['ID_USUARIO'] = $cliente->getIdCliente();
    $_SESSION['NOMBRE_USUARIO'] = $cliente->getNombre();
    echo json_encode(true);
} else {
    echo json_encode(false);
}

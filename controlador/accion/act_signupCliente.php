<?php

require_once(__DIR__ . "/../mdb/mdbCliente.php");

$nombre;
$email;
$password;
$passwordF;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
}

$errores = [];
if (!$nombre) $errores[] = 'El nombre es obligatorio</br>';
if (!$email) $errores[] = 'El email es obligatorio</br>';
if (!$password) $errores[] = 'La contraseña es obligatoria</br>';


if (!empty($errores)) {
    echo json_encode($errores, JSON_UNESCAPED_UNICODE);
    exit;
} else {
    $passwordF = password_hash($password, PASSWORD_DEFAULT);
}

$cliente = new Cliente(NULL, $nombre, $email, $passwordF);

$resultado = registrarCliente($cliente);

if ($resultado == -1) {
    $errores = [];
    $errores[] = 'El email ya ha sido registrado en otra cuenta';
}

echo json_encode($errores, JSON_UNESCAPED_UNICODE);

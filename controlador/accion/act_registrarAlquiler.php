<?php
session_start();
require_once(__DIR__ . "/../mdb/mdbAlquiler.php");

$idCliente;
$valorTotal;
$fechaInicio = date('Y-m-d');
$fechaFin;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idCliente = $_SESSION['ID_USUARIO'];
    $valorTotal = $_POST['valorTotal'];
    $fechaFin = $_POST['fechaFin'];
}

$date_now = date('Y-m-d');
$date_past = strtotime("+${fechaFin} day", strtotime($date_now));
$fechaFin = date('Y-m-d', $date_past);

$alquiler = new Alquiler(NULL, $idCliente, $valorTotal, $fechaInicio, $fechaFin);

$resultado = registrarAlquiler($alquiler);

echo json_encode($resultado, JSON_UNESCAPED_UNICODE);

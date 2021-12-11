<?php
session_start();
require_once(__DIR__ . "/../mdb/mdbPeliculasAlquiler.php");

$idAlquiler;
$pelicula;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idAlquiler = $_POST['idAlquiler'];
    $pelicula = $_POST['pelicula'];
}

$resultado = registrarPeliculasAlquiler($idAlquiler, $pelicula);

echo json_encode($resultado, JSON_UNESCAPED_UNICODE);

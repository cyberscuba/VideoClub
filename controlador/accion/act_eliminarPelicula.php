<?php

require_once(__DIR__ . "/../mdb/mdbPelicula.php");

$idPelicula;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idPelicula = $_POST['idPelicula'];
}


$resultado = eliminarPelicula($idPelicula);

echo json_encode($resultado, JSON_UNESCAPED_UNICODE);

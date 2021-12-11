<?php

require_once(__DIR__ . "/../mdb/mdbPelicula.php");

$idPelicula;
$nombre;
$sinopsis;
$precioUnitario;
$idTipo;
$idGenero;
$fechaEstreno;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $idPelicula = $_POST['idPelicula'];
    $nombre = $_POST['nombre'];
    $sinopsis = $_POST['sinopsis'];
    $precioUnitario = $_POST['precioUnitario'];
    $idTipo = $_POST['idTipo'];
    $idGenero = $_POST['idGenero'];
    $fechaEstreno = $_POST['fechaEstreno'];
}

$pelicula = new Pelicula($idPelicula, $nombre, $sinopsis, $precioUnitario, $idTipo, $idGenero, $fechaEstreno);

$resultado = editarPelicula($pelicula);

echo json_encode($resultado, JSON_UNESCAPED_UNICODE);

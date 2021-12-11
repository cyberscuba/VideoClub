<?php

require_once(__DIR__ . "/../mdb/mdbPelicula.php");

$peliculas = traerPeliculas();

echo json_encode($peliculas);

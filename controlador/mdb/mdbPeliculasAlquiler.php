<?php

require_once(__DIR__ . "/../../modelo/dao/PeliculasAlquilerDAO.php");

function registrarPeliculasAlquiler($idAlquiler, $pelicula)
{

    $dao = new PeliculasAlquilerDAO();

    $resultado = $dao->registrarPeliculasAlquiler($idAlquiler, $pelicula);

    return $resultado;
}

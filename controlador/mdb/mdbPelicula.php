<?php

require_once(__DIR__ . "/../../modelo/dao/PeliculaDAO.php");

function registrarPelicula(Pelicula $pelicula)
{

    $dao = new PeliculaDAO();

    $resultado = $dao->registrarPelicula($pelicula);

    return $resultado;
}


function traerPeliculas()
{

    $dao = new PeliculaDAO();

    $peliculas = $dao->traerPeliculas();

    return $peliculas;
}


function editarPelicula(Pelicula $pelicula)
{
    $dao = new PeliculaDAO();

    $resultado = $dao->editarPelicula($pelicula);

    return $resultado;
}

function eliminarPelicula($idPelicula)
{
    $dao = new PeliculaDAO();

    $resultado = $dao->eliminarPelicula($idPelicula);

    return $resultado;
}

<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entidad/PeliculasAlquiler.php");

class PeliculasAlquilerDAO
{

    public function registrarPeliculasAlquiler($idAlquiler, $pelicula)
    {
        $data_source = new DataSource();
        $sql = "INSERT INTO peliculasalquiler VALUES (:idAlquiler,:pelicula)";

        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':idAlquiler' => $idAlquiler,
                ':pelicula' => $pelicula
            )
        );

        return $resultado;
    }
}

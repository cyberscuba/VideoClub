<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entidad/Pelicula.php");

class PeliculaDAO
{

    public function registrarPelicula(Pelicula $pelicula)
    {
        $data_source = new DataSource();
        $sql = "INSERT INTO pelicula VALUES (NULL,:nombre,:sinopsis,:precioUnitario,:idTipo,:idGenero,:fechaEstreno)";

        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':nombre' => $pelicula->getNombre(),
                ':sinopsis' => $pelicula->getSinopsis(),
                ':precioUnitario' => $pelicula->getPrecioUnitario(),
                ':idTipo' => $pelicula->getIdTipo(),
                ':idGenero' => $pelicula->getIdGenero(),
                ':fechaEstreno' => $pelicula->getFechaEstreno()
            )
        );

        return $resultado;
    }

    public function traerPeliculas()
    {

        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM pelicula ORDER BY idPelicula DESC", null);

        $pelicula = null;

        $peliculas = array();

        foreach ($data_table as $indice => $valor) {

            $pelicula = new Pelicula(
                $data_table[$indice]["idPelicula"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["sinopsis"],
                $data_table[$indice]["precioUnitario"],
                $data_table[$indice]["idTipo"],
                $data_table[$indice]["idGenero"],
                $data_table[$indice]["fechaEstreno"]
            );
            array_push($peliculas, $pelicula);
        }

        return $peliculas;
    }

    public function editarPelicula(Pelicula $pelicula)
    {
        $data_source = new DataSource();

        $resultado = $data_source->ejecutarActualizacion(
            "UPDATE pelicula SET nombre = :nombre, sinopsis = :sinopsis, precioUnitario = :precioUnitario, idTipo= :idTipo, idGenero = :idGenero, fechaEstreno = :fechaEstreno where idPelicula = :idPelicula",
            array(
                ':nombre' => $pelicula->getNombre(),
                ':sinopsis' => $pelicula->getSinopsis(),
                ':precioUnitario' => $pelicula->getPrecioUnitario(),
                ':idTipo' => $pelicula->getIdTipo(),
                ':idGenero' => $pelicula->getIdGenero(),
                ':fechaEstreno' => $pelicula->getFechaEstreno(),
                ':idPelicula' => $pelicula->geIdPelicula()
            )
        );

        return $resultado;
    }


    public function EliminarPelicula($idPelicula)
    {
        $data_source = new DataSource();

        $resultado = $data_source->ejecutarActualizacion(
            "DELETE FROM `pelicula` WHERE  idPelicula = :idPelicula",
            array(
                ':idPelicula' => $idPelicula
            )
        );

        return $resultado;
    }
}

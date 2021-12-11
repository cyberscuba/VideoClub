<?php


class Pelicula
{

    public $idPelicula;
    public $nombre;
    public $sinopsis;
    public $precioUnitario;
    public $idTipo;
    public $idGenero;
    public $fechaEstreno;

    public function __construct($idPelicula, $nombre, $sinopsis, $precioUnitario, $idTipo, $idGenero, $fechaEstreno)
    {
        $this->idPelicula = $idPelicula;
        $this->nombre = $nombre;
        $this->sinopsis = $sinopsis;
        $this->precioUnitario = $precioUnitario;
        $this->idTipo = $idTipo;
        $this->idGenero = $idGenero;
        $this->fechaEstreno = $fechaEstreno;
    }

    public function geIdPelicula()
    {
        return $this->idPelicula;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getSinopsis()
    {
        return $this->sinopsis;
    }

    public function getPrecioUnitario()
    {
        return $this->precioUnitario;
    }

    public function getIdTipo()
    {
        return $this->idTipo;
    }

    public function getIdGenero()
    {
        return $this->idGenero;
    }

    public function getFechaEstreno()
    {
        return $this->fechaEstreno;
    }

    public function setIdPelicula($idPelicula)
    {
        $this->idPelicula = $idPelicula;

        return $this;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function setSinopsis($sinopsis)
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }

    public function setPrecioUnitario($precioUnitario)
    {
        $this->precioUnitario = $precioUnitario;

        return $this;
    }

    public function setIdTipo($idTipo)
    {
        $this->idTipo = $idTipo;

        return $this;
    }

    public function setIdGenero($idGenero)
    {
        $this->idGenero = $idGenero;

        return $this;
    }

    public function setFechaEstreno($fechaEstreno)
    {
        $this->fechaEstreno = $fechaEstreno;

        return $this;
    }
}

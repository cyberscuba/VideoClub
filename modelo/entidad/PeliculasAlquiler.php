<?php


class PeliculasAlquiler
{

    public $idAlquiler;
    public $idPeliculas;

    public function __construct($idAlquiler, $idPeliculas)
    {
        $this->idAlquiler = $idAlquiler;
        $this->idPeliculas = $idPeliculas;
    }

    public function geIdAlquiler()
    {
        return $this->idAlquiler;
    }

    public function getIdPeliculas()
    {
        return $this->idPeliculas;
    }


    public function setIdAlquiler($idAlquiler)
    {
        $this->idAlquiler = $idAlquiler;

        return $this;
    }

    public function setIdPeliculas($idPeliculas)
    {
        $this->idPeliculas = $idPeliculas;

        return $this;
    }
}

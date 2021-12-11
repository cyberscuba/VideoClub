<?php


class Alquiler
{

    public $idAlquiler;
    public $idCliente;
    public $valorTotal;
    public $fechaInicio;
    public $fechaFin;

    public function __construct($idAlquiler, $idCliente, $valorTotal, $fechaInicio, $fechaFin)
    {
        $this->idAlquiler = $idAlquiler;
        $this->idCliente = $idCliente;
        $this->valorTotal = $valorTotal;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }

    public function geIdAlquiler()
    {
        return $this->idAlquiler;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    public function setIdAlquiler($idAlquiler)
    {
        $this->idAlquiler = $idAlquiler;

        return $this;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;

        return $this;
    }

    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }
}

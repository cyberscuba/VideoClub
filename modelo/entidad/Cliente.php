<?php


class Cliente
{

    private $idCliente;
    private $nombre;
    private $email;
    private $password;

    public function __construct($idCliente, $nombre, $email, $password)
    {
        $this->idCliente = $idCliente;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
    }

    public function getIdCliente()
    {
        return $this->idCliente;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setIdCliente($idCliente)
    {
        $this->idCliente = $idCliente;

        return $this;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}

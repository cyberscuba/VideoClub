<?php


class Administrador
{

    private $idAdministrador;
    private $email;
    private $password;

    public function __construct($idAdministrador, $email, $password)
    {
        $this->idAdministrador = $idAdministrador;
        $this->email = $email;
        $this->password = $password;
    }

    public function getIdAdministrador()
    {
        return $this->idAdministrador;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setIdAdministrador($idAdministrador)
    {
        $this->idAdministrador = $idAdministrador;

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

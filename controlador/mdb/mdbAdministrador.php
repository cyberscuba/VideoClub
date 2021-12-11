<?php

require_once(__DIR__ . "/../../modelo/dao/AdministradorDAO.php");


function autenticarAdministrador($correo, $password)
{
    $dao = new AdministradorDAO();

    $cliente = $dao->autenticarAdministrador($correo, $password);

    return $cliente;
}

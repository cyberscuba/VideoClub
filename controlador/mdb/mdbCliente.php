<?php

require_once(__DIR__ . "/../../modelo/dao/ClienteDAO.php");

function registrarCliente(Cliente $cliente)
{

    $dao = new ClienteDAO();

    $resultado = $dao->registrarCliente($cliente);

    return $resultado;
}


function autenticarCliente($correo, $password)
{
    $dao = new ClienteDAO();

    $cliente = $dao->autenticarCliente($correo, $password);

    return $cliente;
}

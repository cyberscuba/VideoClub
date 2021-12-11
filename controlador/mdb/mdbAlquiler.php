<?php

require_once(__DIR__ . "/../../modelo/dao/AlquilerDAO.php");

function registrarAlquiler(Alquiler $alquiler)
{

    $dao = new AlquilerDAO();

    $resultado = $dao->registrarAlquiler($alquiler);

    return $resultado;
}

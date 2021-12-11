<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entidad/Alquiler.php");

class AlquilerDAO
{

    public function registrarAlquiler(Alquiler $alquiler)
    {
        $data_source = new DataSource();
        $sql = "INSERT INTO alquiler VALUES (NULL,:idCliente,:valorTotal,:fechaInicio,:fechaFin)";

        $resultado = $data_source->ejecutarActualizacion(
            $sql,
            array(
                ':idCliente' => $alquiler->getIdCliente(),
                ':valorTotal' => $alquiler->getValorTotal(),
                ':fechaInicio' => $alquiler->getFechaInicio(),
                ':fechaFin' => $alquiler->getFechaFin()
            )
        );

        return $resultado;
    }
}

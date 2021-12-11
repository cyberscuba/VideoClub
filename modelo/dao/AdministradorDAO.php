<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entidad/Administrador.php");

class AdministradorDAO
{


    public function autenticarAdministrador($correo, $password)
    {

        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM administrador WHERE email =:correo", array(':correo' => $correo));

        $administrador = null;

        if (count($data_table) == 1 && password_verify($password, $data_table[0]["password"])) {

            foreach ($data_table as $indice => $valor) {

                $administrador = new Administrador(
                    $data_table[$indice]["idAdministrador"],
                    $data_table[$indice]["email"],
                    $data_table[$indice]["password"]
                );
            }
        }
        return $administrador;
    }
}

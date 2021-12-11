<?php
class DataSource
{

    private $cadenaConexion;
    private $conexion;

    public function __construct()
    {

        try {
            $this->cadenaConexion = "mysql:host=localhost;dbname=videoclub;charset=utf8";

            $this->conexion = new PDO($this->cadenaConexion, "root", "");
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
    }

    public function ejecutarConsulta($sql = "", $values = array())
    {

        if ($sql != "") {


            $consulta = $this->conexion->prepare($sql);
            $consulta->execute($values);
            $tabla_datos = $consulta->fetchAll(PDO::FETCH_ASSOC);


            $this->conexion = null;

            return $tabla_datos;
        } else {
            return 0;
        }
    }

    public function ejecutarActualizacion($sql = "", $values = array())
    {

        if ($sql != "") {

            $consulta = $this->conexion->prepare($sql);

            $consulta->execute($values);

            return $this->conexion->lastInsertId();
            $this->conexion = null;
        } else {
            return 0;
        }
    }
}

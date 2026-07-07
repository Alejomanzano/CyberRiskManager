<?php

require_once(__DIR__ . "/../../config/database.php");

class Observacion
{
    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->conectar();
    }

    public function obtenerTodos()
    {
        $sql="SELECT o.*, r.amenaza
              FROM observaciones o
              INNER JOIN riesgos r
              ON o.id_riesgo=r.id_riesgo
              ORDER BY o.id_observacion DESC";

        $stmt=$this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($datos)
    {
        $sql="INSERT INTO observaciones

(id_riesgo,observacion,recomendacion,historial,responsable,fecha)

VALUES

(:id_riesgo,:observacion,:recomendacion,:historial,:responsable,:fecha)";

        $stmt=$this->conexion->prepare($sql);

        return $stmt->execute($datos);
    }

    public function eliminar($id)
    {
        $sql="DELETE FROM observaciones
              WHERE id_observacion=:id";

        $stmt=$this->conexion->prepare($sql);

        $stmt->bindParam(":id",$id);

        return $stmt->execute();
    }
}
<?php

require_once(__DIR__ . "/../../config/database.php");

class Riesgo
{
    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->conectar();
    }

    public function obtenerTodos()
    {
        $sql = "SELECT r.*, a.nombre AS activo
                FROM riesgos r
                INNER JOIN activos a
                ON r.id_activo = a.id_activo
                ORDER BY r.id_riesgo DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertar($datos)
    {
        $sql = "INSERT INTO riesgos
        (id_activo,amenaza,vulnerabilidad,
        probabilidad,impacto,nivel_riesgo,clasificacion)

        VALUES
        (:id_activo,:amenaza,:vulnerabilidad,
        :probabilidad,:impacto,:nivel_riesgo,:clasificacion)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute($datos);
    }
}
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

    // Obtener todos los riesgos
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

    // Insertar riesgo
    public function insertar($datos)
    {
        $sql = "INSERT INTO riesgos
        (
            id_activo,
            descripcion_riesgo,
            amenaza,
            vulnerabilidad,
            probabilidad,
            impacto,
            nivel_riesgo,
            clasificacion
        )

        VALUES
        (
            :id_activo,
            :descripcion_riesgo,
            :amenaza,
            :vulnerabilidad,
            :probabilidad,
            :impacto,
            :nivel_riesgo,
            :clasificacion
        )";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute($datos);
    }

    // Obtener un riesgo por ID
    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM riesgos WHERE id_riesgo=:id";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar riesgo
    public function actualizar($datos)
    {
        $sql="UPDATE riesgos SET

        id_activo=:id_activo,
        descripcion_riesgo=:descripcion_riesgo,
        amenaza=:amenaza,
        vulnerabilidad=:vulnerabilidad,
        probabilidad=:probabilidad,
        impacto=:impacto,
        nivel_riesgo=:nivel_riesgo,
        clasificacion=:clasificacion

        WHERE id_riesgo=:id";

        $stmt=$this->conexion->prepare($sql);

        return $stmt->execute($datos);
    }

    // Eliminar riesgo
    public function eliminar($id)
    {
        $sql="DELETE FROM riesgos WHERE id_riesgo=:id";

        $stmt=$this->conexion->prepare($sql);

        $stmt->bindParam(":id",$id);

        return $stmt->execute();
    }
}
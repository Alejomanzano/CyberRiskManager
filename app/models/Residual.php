<?php

require_once(__DIR__ . "/../../config/database.php");

class Residual
{
    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->conectar();
    }

    // Obtener todos
    public function obtenerTodos()
    {
        $sql = "SELECT rr.*, c.control_propuesto
                FROM riesgos_residuales rr
                INNER JOIN controles c
                ON rr.id_control = c.id_control
                ORDER BY rr.id_residual DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insertar
    public function insertar($datos)
    {
        $sql = "INSERT INTO riesgos_residuales
        (id_control,nueva_probabilidad,nuevo_impacto,
        riesgo_residual,porcentaje_reduccion)

        VALUES
        (:id_control,:nueva_probabilidad,:nuevo_impacto,
        :riesgo_residual,:porcentaje_reduccion)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute($datos);
    }

    // Obtener por ID
    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM riesgos_residuales
                WHERE id_residual=:id";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":id",$id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar
    public function actualizar($datos)
    {
        $sql = "UPDATE riesgos_residuales SET

        id_control=:id_control,
        nueva_probabilidad=:nueva_probabilidad,
        nuevo_impacto=:nuevo_impacto,
        riesgo_residual=:riesgo_residual,
        porcentaje_reduccion=:porcentaje_reduccion

        WHERE id_residual=:id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute($datos);
    }

    // Eliminar
    public function eliminar($id)
    {
        $sql = "DELETE FROM riesgos_residuales
                WHERE id_residual=:id";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":id",$id);

        return $stmt->execute();
    }
}
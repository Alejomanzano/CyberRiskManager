<?php

require_once(__DIR__ . "/../../config/database.php");

class Control
{
    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->conectar();
    }

    // Obtener todos los controles
    public function obtenerTodos()
    {
        $sql = "SELECT c.*, r.amenaza
                FROM controles c
                INNER JOIN riesgos r
                ON c.id_riesgo = r.id_riesgo
                ORDER BY c.id_control DESC";

        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insertar control
    public function insertar($datos)
    {
        $sql = "INSERT INTO controles
        (id_riesgo,tratamiento,control_propuesto,
        responsable,fecha_implementacion,estado)

        VALUES
        (:id_riesgo,:tratamiento,:control_propuesto,
        :responsable,:fecha_implementacion,:estado)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute($datos);
    }

    // Obtener un control por ID
    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM controles
                WHERE id_control=:id";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":id",$id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar
    public function actualizar($datos)
    {
        $sql = "UPDATE controles SET

        id_riesgo=:id_riesgo,
        tratamiento=:tratamiento,
        control_propuesto=:control_propuesto,
        responsable=:responsable,
        fecha_implementacion=:fecha_implementacion,
        estado=:estado

        WHERE id_control=:id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute($datos);
    }

    // Eliminar
    public function eliminar($id)
    {
        $sql = "DELETE FROM controles
                WHERE id_control=:id";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":id",$id);

        return $stmt->execute();
    }
}
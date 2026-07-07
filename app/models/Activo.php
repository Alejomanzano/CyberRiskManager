<?php

require_once(__DIR__ . "/../../config/database.php");

class Activo
{
    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->conectar();
    }

    // Obtener todos los activos
    public function obtenerTodos()
    {
        $sql = "SELECT * FROM activos ORDER BY id_activo DESC";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Insertar un activo
    public function insertar($datos)
    {
        $sql = "INSERT INTO activos
        (nombre,tipo,propietario,descripcion,
        confidencialidad,integridad,disponibilidad,valor_activo)

        VALUES
        (:nombre,:tipo,:propietario,:descripcion,
        :confidencialidad,:integridad,:disponibilidad,:valor_activo)";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute($datos);
    }

    

    // Eliminar un activo
    public function eliminar($id)
    {
        $sql = "DELETE FROM activos WHERE id_activo = :id";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":id", $id);

        return $stmt->execute();
    }

        // Obtener un activo por ID
    public function obtenerPorId($id)
    {
        $sql = "SELECT * FROM activos WHERE id_activo = :id";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un activo
    public function actualizar($datos)
    {
        $sql = "UPDATE activos SET

        nombre=:nombre,
        tipo=:tipo,
        propietario=:propietario,
        descripcion=:descripcion,
        confidencialidad=:confidencialidad,
        integridad=:integridad,
        disponibilidad=:disponibilidad,
        valor_activo=:valor_activo

        WHERE id_activo=:id";

        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute($datos);
    }

    

}
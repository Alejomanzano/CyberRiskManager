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
        // Buscar riesgos del activo
        $sql = "SELECT id_riesgo FROM riesgos WHERE id_activo=:id";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        $riesgos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($riesgos as $r){

            // Eliminar observaciones del riesgo
            $sql = "DELETE FROM observaciones
                    WHERE id_riesgo = :id_riesgo";

            $stmt2 = $this->conexion->prepare($sql);
            $stmt2->bindParam(":id_riesgo", $r["id_riesgo"]);
            $stmt2->execute();

            // Eliminar riesgos residuales
            $sql = "DELETE rr
                    FROM riesgos_residuales rr
                    INNER JOIN controles c
                    ON rr.id_control = c.id_control
                    WHERE c.id_riesgo = :id_riesgo";

            $stmt2 = $this->conexion->prepare($sql);
            $stmt2->bindParam(":id_riesgo",$r["id_riesgo"]);
            $stmt2->execute();

            // Eliminar controles
            $sql = "DELETE FROM controles
                    WHERE id_riesgo=:id_riesgo";

            $stmt2 = $this->conexion->prepare($sql);
            $stmt2->bindParam(":id_riesgo",$r["id_riesgo"]);
            $stmt2->execute();
        }

        // Eliminar riesgos
        $sql = "DELETE FROM riesgos
                WHERE id_activo=:id";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();

        // Finalmente eliminar el activo
        $sql = "DELETE FROM activos
                WHERE id_activo=:id";

        $stmt = $this->conexion->prepare($sql);
        $stmt->bindParam(":id",$id);

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
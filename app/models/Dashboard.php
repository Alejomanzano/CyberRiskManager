<?php

require_once(__DIR__ . "/../../config/database.php");

class Dashboard
{
    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->conectar();
    }

    public function totalActivos()
    {
        return $this->conexion->query("SELECT COUNT(*) FROM activos")->fetchColumn();
    }

    public function totalRiesgos()
    {
        return $this->conexion->query("SELECT COUNT(*) FROM riesgos")->fetchColumn();
    }

    public function totalControles()
    {
        return $this->conexion->query("SELECT COUNT(*) FROM controles")->fetchColumn();
    }

    public function totalResidual()
    {
        return $this->conexion->query("SELECT COUNT(*) FROM riesgos_residuales")->fetchColumn();
    }

    public function riesgosPorNivel()
    {
        $sql="SELECT clasificacion,
                     COUNT(*) total
              FROM riesgos
              GROUP BY clasificacion";

        $stmt=$this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function riesgosPorActivo()
    {
        $sql="SELECT activos.nombre,
                     COUNT(*) total

              FROM riesgos

              INNER JOIN activos
              ON riesgos.id_activo=activos.id_activo

              GROUP BY activos.nombre";

        $stmt=$this->conexion->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
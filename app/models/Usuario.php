<?php

require_once(__DIR__ . "/../../config/database.php");

class Usuario
{
    private $conexion;

    public function __construct()
    {
        $db = new Database();
        $this->conexion = $db->conectar();
    }

    public function login($correo)
    {
        $sql = "SELECT * FROM usuarios WHERE correo = :correo";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":correo", $correo);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
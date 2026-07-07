<?php

require_once("../models/Usuario.php");
require_once("../../config/session.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = trim($_POST["correo"]);
    $password = trim($_POST["password"]);

    $usuario = new Usuario();

    $datos = $usuario->login($correo);

    if ($datos && password_verify($password, $datos["password"])) {

        $_SESSION["usuario"] = $datos["nombre"];
        $_SESSION["rol"] = $datos["rol"];

        header("Location: ../views/dashboard.php");
        exit();

    } else {

        header("Location: ../views/login.php?error=1");
        exit();

    }

}
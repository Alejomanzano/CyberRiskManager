<?php

require_once("../models/Activo.php");

$activo = new Activo();

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $valor =
    ($_POST["confidencialidad"]
    +
    $_POST["integridad"]
    +
    $_POST["disponibilidad"])/3;

    $datos=[

        "nombre"=>$_POST["nombre"],

        "tipo"=>$_POST["tipo"],

        "propietario"=>$_POST["propietario"],

        "descripcion"=>$_POST["descripcion"],

        "confidencialidad"=>$_POST["confidencialidad"],

        "integridad"=>$_POST["integridad"],

        "disponibilidad"=>$_POST["disponibilidad"],

        "valor_activo"=>$valor

    ];

    $activo->insertar($datos);

    header("Location: ../views/activos/index.php");

}
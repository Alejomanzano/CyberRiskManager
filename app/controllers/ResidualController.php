<?php

require_once("../models/Residual.php");

$residual = new Residual();

/* ELIMINAR */

if(isset($_GET["eliminar"])){

    $residual->eliminar($_GET["eliminar"]);

    header("Location: ../views/residual/index.php");

    exit();

}

/* ACTUALIZAR */

if(isset($_POST["actualizar"])){

    $riesgoResidual =
        $_POST["nueva_probabilidad"] *
        $_POST["nuevo_impacto"];

    $porcentaje =
        $_POST["porcentaje_reduccion"];

    $datos=[

        "id"=>$_POST["id"],

        "id_control"=>$_POST["id_control"],

        "nueva_probabilidad"=>$_POST["nueva_probabilidad"],

        "nuevo_impacto"=>$_POST["nuevo_impacto"],

        "riesgo_residual"=>$riesgoResidual,

        "porcentaje_reduccion"=>$porcentaje

    ];

    $residual->actualizar($datos);

    header("Location: ../views/residual/index.php");

    exit();

}

/* INSERTAR */

if($_SERVER["REQUEST_METHOD"]=="POST" && !isset($_POST["actualizar"])){

    $riesgoResidual =
        $_POST["nueva_probabilidad"] *
        $_POST["nuevo_impacto"];

    $porcentaje =
        $_POST["porcentaje_reduccion"];

    $datos=[

        "id_control"=>$_POST["id_control"],

        "nueva_probabilidad"=>$_POST["nueva_probabilidad"],

        "nuevo_impacto"=>$_POST["nuevo_impacto"],

        "riesgo_residual"=>$riesgoResidual,

        "porcentaje_reduccion"=>$porcentaje

    ];

    $residual->insertar($datos);

    header("Location: ../views/residual/index.php");

    exit();

}
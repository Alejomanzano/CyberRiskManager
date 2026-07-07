<?php

require_once("../models/Control.php");

$control = new Control();

/* ==========================
   ELIMINAR
========================== */

if(isset($_GET["eliminar"])){

    $control->eliminar($_GET["eliminar"]);

    header("Location: ../views/controles/index.php");

    exit();

}


/* ==========================
   ACTUALIZAR
========================== */

if(isset($_POST["actualizar"])){

    $datos=[

        "id"=>$_POST["id"],

        "id_riesgo"=>$_POST["id_riesgo"],

        "tratamiento"=>$_POST["tratamiento"],

        "control_propuesto"=>$_POST["control_propuesto"],

        "responsable"=>$_POST["responsable"],

        "fecha_implementacion"=>$_POST["fecha_implementacion"],

        "estado"=>$_POST["estado"]

    ];

    $control->actualizar($datos);

    header("Location: ../views/controles/index.php");

    exit();

}


/* ==========================
   INSERTAR
========================== */

if($_SERVER["REQUEST_METHOD"]=="POST" && !isset($_POST["actualizar"])){

    $datos=[

        "id_riesgo"=>$_POST["id_riesgo"],

        "tratamiento"=>$_POST["tratamiento"],

        "control_propuesto"=>$_POST["control_propuesto"],

        "responsable"=>$_POST["responsable"],

        "fecha_implementacion"=>$_POST["fecha_implementacion"],

        "estado"=>$_POST["estado"]

    ];

    $control->insertar($datos);

    header("Location: ../views/controles/index.php");

    exit();

}
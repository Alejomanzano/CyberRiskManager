<?php

require_once("../models/Observacion.php");

$model=new Observacion();

if(isset($_GET["eliminar"])){

    $model->eliminar($_GET["eliminar"]);

    header("Location: ../views/observaciones/index.php");

    exit();

}

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $datos=[

        "id_riesgo"=>$_POST["id_riesgo"],

        "observacion"=>$_POST["observacion"],

        "recomendacion"=>$_POST["recomendacion"],

        "historial"=>$_POST["historial"],

        "responsable"=>$_POST["responsable"],

        "fecha"=>$_POST["fecha"]

    ];

    $model->insertar($datos);

    header("Location: ../views/observaciones/index.php");

}
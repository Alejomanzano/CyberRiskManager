<?php

require_once("../models/Riesgo.php");

$riesgo = new Riesgo();

/* ==========================
   ELIMINAR
========================== */

if(isset($_GET["eliminar"])){

    $riesgo->eliminar($_GET["eliminar"]);

    header("Location: ../views/riesgos/index.php");
    exit();

}


/* ==========================
   ACTUALIZAR
========================== */

if(isset($_POST["actualizar"])){

    $nivel =
    $_POST["probabilidad"] *
    $_POST["impacto"];

    if($nivel<=5)
        $clasificacion="Bajo";

    elseif($nivel<=10)
        $clasificacion="Medio";

    elseif($nivel<=15)
        $clasificacion="Alto";

    else
        $clasificacion="Crítico";

    $datos=[

        "id"=>$_POST["id"],

        "id_activo"=>$_POST["id_activo"],

        "amenaza"=>$_POST["amenaza"],

        "vulnerabilidad"=>$_POST["vulnerabilidad"],

        "probabilidad"=>$_POST["probabilidad"],

        "impacto"=>$_POST["impacto"],

        "nivel_riesgo"=>$nivel,

        "clasificacion"=>$clasificacion

    ];

    $riesgo->actualizar($datos);

    header("Location: ../views/riesgos/index.php");

    exit();

}


/* ==========================
   INSERTAR
========================== */

if($_SERVER["REQUEST_METHOD"]=="POST" && !isset($_POST["actualizar"])){

    $nivel =
    $_POST["probabilidad"] *
    $_POST["impacto"];

    if($nivel<=5)
        $clasificacion="Bajo";

    elseif($nivel<=10)
        $clasificacion="Medio";

    elseif($nivel<=15)
        $clasificacion="Alto";

    else
        $clasificacion="Crítico";

    $datos=[

        "id_activo"=>$_POST["id_activo"],

        "amenaza"=>$_POST["amenaza"],

        "vulnerabilidad"=>$_POST["vulnerabilidad"],

        "probabilidad"=>$_POST["probabilidad"],

        "impacto"=>$_POST["impacto"],

        "nivel_riesgo"=>$nivel,

        "clasificacion"=>$clasificacion

    ];

    $riesgo->insertar($datos);

    header("Location: ../views/riesgos/index.php");

    exit();

}
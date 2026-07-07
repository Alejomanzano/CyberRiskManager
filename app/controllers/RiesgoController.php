<?php

require_once("../models/Riesgo.php");

$riesgo = new Riesgo();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $nivel =
    $_POST["probabilidad"] *
    $_POST["impacto"];

    if($nivel <= 5)
        $clasificacion="Bajo";

    elseif($nivel <= 10)
        $clasificacion="Medio";

    elseif($nivel <= 15)
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
}
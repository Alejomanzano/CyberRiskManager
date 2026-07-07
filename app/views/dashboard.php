<?php

require_once("../../config/session.php");
require_once("../models/Dashboard.php");

if (!isset($_SESSION["usuario"])) {

    header("Location: login.php");
    exit();
}

$dashboard = new Dashboard();

$totalActivos = $dashboard->totalActivos();
$totalRiesgos = $dashboard->totalRiesgos();
$totalControles = $dashboard->totalControles();
$totalResidual = $dashboard->totalResidual();

$nivel = $dashboard->riesgosPorNivel();
$activo = $dashboard->riesgosPorActivo();

include("layouts/header.php");
include("layouts/sidebar.php");

?>

<div class="container-fluid">

    <h2 class="mb-4">
        Bienvenido,
        <strong><?= $_SESSION["usuario"] ?></strong>
    </h2>

    <!-- TARJETAS -->

    <div class="row">

        <div class="col-md-3 mb-3">

            <div class="card shadow stat-card text-center">

                <div class="card-body">

                    <h2><?= $totalActivos ?></h2>

                    <p>Total Activos</p>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card shadow stat-card text-center">

                <div class="card-body">

                    <h2><?= $totalRiesgos ?></h2>

                    <p>Total Riesgos</p>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card shadow stat-card text-center">

                <div class="card-body">

                    <h2><?= $totalControles ?></h2>

                    <p>Tratamientos</p>

                </div>

            </div>

        </div>

        <div class="col-md-3 mb-3">

            <div class="card shadow stat-card text-center">

                <div class="card-body">

                    <h2><?= $totalResidual ?></h2>

                    <p>Riesgos Residuales</p>

                </div>

            </div>

        </div>

    </div>

    <!-- GRÁFICOS -->

    <div class="row mt-4">

        <div class="col-lg-6">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    Riesgos por Nivel

                </div>

                <div class="card-body">

                    <canvas id="nivelChart"></canvas>

                </div>

            </div>

        </div>

        <div class="col-lg-6">

            <div class="card shadow">

                <div class="card-header bg-success text-white">

                    Riesgos por Activo

                </div>

                <div class="card-body">

                    <canvas id="activoChart"></canvas>

                </div>

            </div>

        </div>

    </div>

</div>

<script>

// ---------- GRAFICO 1 ----------

const nivelChart = document.getElementById('nivelChart');

new Chart(nivelChart,{

    type:'bar',

    data:{

        labels:[

            <?php
            foreach($nivel as $n){
                echo "'".$n["clasificacion"]."',";
            }
            ?>

        ],

        datasets:[{

            label:'Cantidad de Riesgos',

            data:[

                <?php
                foreach($nivel as $n){
                    echo $n["total"].",";
                }
                ?>

            ]

        }]

    }

});

// ---------- GRAFICO 2 ----------

const activoChart = document.getElementById('activoChart');

new Chart(activoChart,{

    type:'pie',

    data:{

        labels:[

            <?php
            foreach($activo as $a){
                echo "'".$a["nombre"]."',";
            }
            ?>

        ],

        datasets:[{

            data:[

                <?php
                foreach($activo as $a){
                    echo $a["total"].",";
                }
                ?>

            ]

        }]

    }

});

</script>

<?php include("layouts/footer.php"); ?>
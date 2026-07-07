<?php

require_once("../../models/Residual.php");
require_once("../../../config/session.php");

if(!isset($_SESSION["usuario"])){
    header("Location: ../login.php");
    exit();
}

$model = new Residual();
$residuales = $model->obtenerTodos();

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<div class="d-flex justify-content-between mb-4">

    <h2>Riesgo Residual</h2>

    <a href="crear.php" class="btn btn-primary">

        <i class="bi bi-plus-circle"></i>

        Nuevo Riesgo Residual

    </a>

</div>

<table class="table table-bordered table-hover">

    <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Control</th>
            <th>Probabilidad</th>
            <th>Impacto</th>
            <th>Riesgo Residual</th>
            <th>Reducción</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach($residuales as $r): ?>

        <tr>

            <td><?= $r["id_residual"] ?></td>

            <td><?= $r["control_propuesto"] ?></td>

            <td><?= $r["nueva_probabilidad"] ?></td>

            <td><?= $r["nuevo_impacto"] ?></td>

            <td>

                <span class="badge bg-primary">

                    <?= $r["riesgo_residual"] ?>

                </span>

            </td>

            <td>

                <div class="progress">

                    <div
                    class="progress-bar bg-success"
                    style="width:<?= $r["porcentaje_reduccion"] ?>%">

                    <?= $r["porcentaje_reduccion"] ?>%

                    </div>

                </div>

            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

<?php include("../layouts/footer.php"); ?>
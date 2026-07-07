<?php

require_once("../../models/Riesgo.php");
require_once("../../../config/session.php");

$model = new Riesgo();
$riesgos = $model->obtenerTodos();

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<div class="d-flex justify-content-between mb-4">

    <h2>Gestión de Riesgos</h2>

    <a href="crear.php" class="btn btn-primary">
        Nuevo Riesgo
    </a>

</div>

    <table class="table table-bordered table-hover">

        <thead class="table-dark">

    <tr>

    <th>ID</th>
    <th>Activo</th>
    <th>Amenaza</th>
    <th>Vulnerabilidad</th>
    <th>Probabilidad</th>
    <th>Impacto</th>
    <th>Nivel</th>
    <th>Clasificación</th>
    <th width="180">Acciones</th>

    </tr>

    </thead>

    <tbody>

        <?php foreach($riesgos as $r): ?>

        <tr>

            <td><?= $r["id_riesgo"] ?></td>

            <td><?= $r["activo"] ?></td>

            <td><?= $r["amenaza"] ?></td>

            <td><?= $r["vulnerabilidad"] ?></td>

            <td><?= $r["probabilidad"] ?></td>

            <td><?= $r["impacto"] ?></td>

            <td><?= $r["nivel_riesgo"] ?></td>

            <td>

                <?php

                if($r["clasificacion"]=="Bajo")
                    echo '<span class="badge bg-success">Bajo</span>';

                elseif($r["clasificacion"]=="Medio")
                    echo '<span class="badge bg-warning text-dark">Medio</span>';

                elseif($r["clasificacion"]=="Alto")
                    echo '<span class="badge bg-danger">Alto</span>';

                else
                    echo '<span class="badge bg-dark">Crítico</span>';

                ?>

            </td>

        </tr>

        <?php endforeach; ?>

    </tbody>

    <td>

    <a
    href="editar.php?id=<?= $r["id_riesgo"] ?>"
    class="btn btn-warning btn-sm">

    <i class="bi bi-pencil-square"></i>

    Editar

    </a>

    <a
    href="../../controllers/RiesgoController.php?eliminar=<?= $r["id_riesgo"] ?>"
    class="btn btn-danger btn-sm"
    onclick="return confirm('¿Eliminar este riesgo?')">

    <i class="bi bi-trash"></i>

    Eliminar

    </a>

    </td>

</table>

<?php include("../layouts/footer.php"); ?>
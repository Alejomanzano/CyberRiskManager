<?php

require_once("../../models/Control.php");
require_once("../../../config/session.php");

if(!isset($_SESSION["usuario"])){
    header("Location: ../login.php");
    exit();
}

$model = new Control();
$controles = $model->obtenerTodos();

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<div class="d-flex justify-content-between mb-4">

    <h2>Tratamiento del Riesgo</h2>

    <a href="crear.php" class="btn btn-primary">
        <i class="bi bi-plus-circle"></i> Nuevo Tratamiento
    </a>

</div>

<table class="table table-bordered table-hover">

    <thead class="table-dark">

        <tr>

            <th>ID</th>
            <th>Riesgo</th>
            <th>Tratamiento</th>
            <th>Control</th>
            <th>Responsable</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th width="180">Acciones</th>

        </tr>

    </thead>

    <tbody>

    <?php foreach($controles as $c): ?>

        <tr>

            <td><?= $c["id_control"] ?></td>

            <td><?= $c["amenaza"] ?></td>

            <td><?= $c["tratamiento"] ?></td>

            <td><?= $c["control_propuesto"] ?></td>

            <td><?= $c["responsable"] ?></td>

            <td><?= $c["fecha_implementacion"] ?></td>

            <td>

                <?php

                if($c["estado"]=="Pendiente")
                    echo '<span class="badge bg-warning text-dark">Pendiente</span>';

                elseif($c["estado"]=="En proceso")
                    echo '<span class="badge bg-info">En proceso</span>';

                else
                    echo '<span class="badge bg-success">Implementado</span>';

                ?>

            </td>

            <td>

                <a
                href="editar.php?id=<?= $c["id_control"] ?>"
                class="btn btn-warning btn-sm">

                    <i class="bi bi-pencil-square"></i>

                    Editar

                </a>

                <a
                href="../../controllers/ControlController.php?eliminar=<?= $c["id_control"] ?>"
                class="btn btn-danger btn-sm"
                onclick="return confirm('¿Eliminar este tratamiento?')">

                    <i class="bi bi-trash"></i>

                    Eliminar

                </a>

            </td>

        </tr>

    <?php endforeach; ?>

    </tbody>

</table>

<?php include("../layouts/footer.php"); ?>
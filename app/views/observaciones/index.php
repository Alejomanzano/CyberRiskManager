<?php

require_once("../../models/Observacion.php");
require_once("../../../config/session.php");

if(!isset($_SESSION["usuario"])){

    header("Location: ../login.php");
    exit();

}

$model = new Observacion();
$observaciones = $model->obtenerTodos();

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<div class="d-flex justify-content-between mb-4">

<h2>Observaciones</h2>

<a href="crear.php" class="btn btn-primary">

<i class="bi bi-plus-circle"></i>

Nueva Observación

</a>

</div>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Riesgo</th>

<th>Observación</th>

<th>Recomendación</th>

<th>Responsable</th>

<th>Fecha</th>

<th width="120">Acción</th>

</tr>

</thead>

<tbody>

<?php foreach($observaciones as $o): ?>

<tr>

<td><?= $o["id_observacion"] ?></td>

<td><?= $o["amenaza"] ?></td>

<td><?= $o["observacion"] ?></td>

<td><?= $o["recomendacion"] ?></td>

<td><?= $o["responsable"] ?></td>

<td><?= $o["fecha"] ?></td>

<td>

<a
href="../../controllers/ObservacionController.php?eliminar=<?= $o["id_observacion"] ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('¿Eliminar esta observación?')">

<i class="bi bi-trash"></i>

Eliminar

</a>

</td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<?php include("../layouts/footer.php"); ?>
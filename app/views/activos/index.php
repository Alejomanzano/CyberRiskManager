<?php

require_once("../../models/Activo.php");
require_once("../../../config/session.php");

$model = new Activo();
$activos = $model->obtenerTodos();

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<div class="d-flex justify-content-between mb-4">

<h2>Gestión de Activos</h2>

<a href="crear.php" class="btn btn-primary">

Nuevo Activo

</a>

</div>

<table class="table table-bordered table-hover">

<thead class="table-dark">

<tr>

<th>ID</th>

<th>Nombre</th>

<th>Tipo</th>

<th>Propietario</th>

<th>Valor</th>

</tr>

</thead>

<tbody>

<?php foreach($activos as $a): ?>

<tr>

<td><?= $a["id_activo"] ?></td>

<td><?= $a["nombre"] ?></td>

<td><?= $a["tipo"] ?></td>

<td><?= $a["propietario"] ?></td>

<td><?= number_format($a["valor_activo"],2) ?></td>

</tr>

<?php endforeach; ?>

</tbody>

</table>

<?php include("../layouts/footer.php"); ?>
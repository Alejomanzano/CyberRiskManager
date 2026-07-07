<?php

require_once("../../models/Riesgo.php");

$model = new Riesgo();
$riesgos = $model->obtenerTodos();

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<h2 class="mb-4">Registrar Observación</h2>

<form method="POST" action="../../controllers/ObservacionController.php">

<div class="mb-3">

<label>Riesgo</label>

<select
name="id_riesgo"
class="form-select"
required>

<?php foreach($riesgos as $r): ?>

<option value="<?= $r["id_riesgo"] ?>">

<?= $r["amenaza"] ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label>Observación</label>

<textarea
name="observacion"
class="form-control"
rows="3"
required></textarea>

</div>

<div class="mb-3">

<label>Recomendación</label>

<textarea
name="recomendacion"
class="form-control"
rows="3"></textarea>

</div>

<div class="mb-3">

<label>Historial de acciones</label>

<textarea
name="historial"
class="form-control"
rows="3"></textarea>

</div>

<div class="mb-3">

<label>Responsable</label>

<input
type="text"
name="responsable"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Fecha</label>

<input
type="date"
name="fecha"
class="form-control"
required>

</div>

<button class="btn btn-primary">

Guardar Observación

</button>

<a href="index.php" class="btn btn-secondary">

Cancelar

</a>

</form>

<?php include("../layouts/footer.php"); ?>
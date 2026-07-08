<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once("../../models/Activo.php");

$model = new Activo();
$activos = $model->obtenerTodos();

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<h2 class="mb-4">Registrar Riesgo</h2>

<form method="POST" action="../../controllers/RiesgoController.php">

<div class="mb-3">

<label class="form-label">

Activo

</label>

<select
name="id_activo"
class="form-select"
required>

<?php foreach($activos as $a): ?>

<option value="<?= $a["id_activo"] ?>">

<?= $a["nombre"] ?>

</option>

<?php endforeach; ?>

</select>

</div>
<div class="mb-3">

<label class="form-label">

Descripción del Riesgo

</label>

<textarea
name="descripcion_riesgo"
class="form-control"
rows="3"
required></textarea>

</div>
<div class="mb-3">

<label>

Amenaza

</label>

<input
type="text"
name="amenaza"
class="form-control"
required>

</div>

<div class="mb-3">

<label>

Vulnerabilidad

</label>

<input
type="text"
name="vulnerabilidad"
class="form-control"
required>

</div>

<div class="row">

<div class="col-md-6">

<label>

Probabilidad

</label>

<select
name="probabilidad"
class="form-select">

<?php for($i=1;$i<=5;$i++): ?>

<option value="<?= $i ?>">

<?= $i ?>

</option>

<?php endfor; ?>

</select>

</div>

<div class="col-md-6">

<label>

Impacto

</label>

<select
name="impacto"
class="form-select">

<?php for($i=1;$i<=5;$i++): ?>

<option value="<?= $i ?>">

<?= $i ?>

</option>

<?php endfor; ?>

</select>

</div>

</div>

<br>

<button
class="btn btn-primary">

Guardar Riesgo

</button>

<a
href="index.php"
class="btn btn-secondary">

Cancelar

</a>

</form>

<?php include("../layouts/footer.php"); ?>

<div class="mb-3">

<label class="form-label">

Descripción del Riesgo

</label>

<textarea
name="descripcion_riesgo"
class="form-control"
required></textarea>

</div>
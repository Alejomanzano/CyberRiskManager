<?php

require_once("../../models/Riesgo.php");

$model = new Riesgo();
$riesgos = $model->obtenerTodos();

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<h2 class="mb-4">Registrar Tratamiento del Riesgo</h2>

<form method="POST" action="../../controllers/ControlController.php">

<div class="mb-3">

<label>Riesgo</label>

<select
name="id_riesgo"
class="form-select">

<?php foreach($riesgos as $r): ?>

<option value="<?= $r["id_riesgo"] ?>">

<?= $r["amenaza"] ?>

</option>

<?php endforeach; ?>

</select>

</div>

<div class="mb-3">

<label>Tratamiento</label>

<select
name="tratamiento"
class="form-select">

<option>Mitigar</option>

<option>Transferir</option>

<option>Aceptar</option>

<option>Evitar</option>

</select>

</div>

<div class="mb-3">

<label>Control Propuesto</label>

<input
type="text"
name="control_propuesto"
class="form-control"
placeholder="Ejemplo: Firewall">

</div>

<div class="mb-3">

<label>Responsable</label>

<input
type="text"
name="responsable"
class="form-control">

</div>

<div class="mb-3">

<label>Fecha de Implementación</label>

<input
type="date"
name="fecha_implementacion"
class="form-control">

</div>

<div class="mb-3">

<label>Estado</label>

<select
name="estado"
class="form-select">

<option>Pendiente</option>

<option>En proceso</option>

<option>Implementado</option>

</select>

</div>

<button class="btn btn-primary">

Guardar Tratamiento

</button>

<a href="index.php"
class="btn btn-secondary">

Cancelar

</a>

</form>

<?php include("../layouts/footer.php"); ?>
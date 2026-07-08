<?php

require_once("../../models/Control.php");
require_once("../../models/Riesgo.php");

$controlModel = new Control();
$riesgoModel = new Riesgo();

$control = $controlModel->obtenerPorId($_GET["id"]);

$riesgos = $riesgoModel->obtenerTodos();

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<h2 class="mb-4">Editar Tratamiento de Riesgo</h2>

<form method="POST" action="../../controllers/ControlController.php">

<input
type="hidden"
name="id"
value="<?= $control["id_control"] ?>">

<input
type="hidden"
name="actualizar"
value="1">

<div class="mb-3">

<label>Riesgo</label>

<select
name="id_riesgo"
class="form-select">

<?php foreach($riesgos as $r): ?>

<option
value="<?= $r["id_riesgo"] ?>"

<?= ($r["id_riesgo"]==$control["id_riesgo"]) ? "selected" : "" ?>

>

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

<?php

$tratamientos=[

"Mitigar",

"Transferir",

"Aceptar",

"Evitar"

];

foreach($tratamientos as $t){

?>

<option

value="<?= $t ?>"

<?= ($control["tratamiento"]==$t) ? "selected" : "" ?>

>

<?= $t ?>

</option>

<?php } ?>

</select>

</div>

<div class="mb-3">

<label>Control Propuesto</label>

<input

type="text"

name="control_propuesto"

class="form-control"

value="<?= $control["control_propuesto"] ?>">

</div>

<div class="mb-3">

<label>Responsable</label>

<input

type="text"

name="responsable"

class="form-control"

value="<?= $control["responsable"] ?>">

</div>

<div class="mb-3">

<label>Fecha Implementación</label>

<input

type="date"

name="fecha_implementacion"

class="form-control"

value="<?= $control["fecha_implementacion"] ?>">

</div>

<div class="mb-3">

<label>Estado</label>

<select
name="estado"
class="form-select">

<?php

$estados=[

"Pendiente",

"En proceso",

"Implementado"

];

foreach($estados as $e){

?>

<option

value="<?= $e ?>"

<?= ($control["estado"]==$e) ? "selected" : "" ?>

>

<?= $e ?>

</option>

<?php } ?>

</select>

</div>

<button
class="btn btn-primary">

Actualizar

</button>

<a
href="index.php"
class="btn btn-secondary">

Cancelar

</a>

</form>

<?php include("../layouts/footer.php"); ?>
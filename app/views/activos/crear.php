<?php

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<h2 class="mb-4">Nuevo Activo</h2>

<form method="POST" action="../../controllers/ActivoController.php">

<div class="row">

<div class="col-md-6 mb-3">

<label>Nombre</label>

<input
type="text"
name="nombre"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Tipo</label>

<input
type="text"
name="tipo"
class="form-control"
required>

</div>

<div class="col-md-6 mb-3">

<label>Propietario</label>

<input
type="text"
name="propietario"
class="form-control">

</div>

<div class="col-md-6 mb-3">

<label>Descripción</label>

<textarea
name="descripcion"
class="form-control"></textarea>

</div>

<div class="col-md-4 mb-3">

<label>Confidencialidad</label>

<input
type="number"
name="confidencialidad"
min="1"
max="5"
class="form-control"
required>

</div>

<div class="col-md-4 mb-3">

<label>Integridad</label>

<input
type="number"
name="integridad"
min="1"
max="5"
class="form-control"
required>

</div>

<div class="col-md-4 mb-3">

<label>Disponibilidad</label>

<input
type="number"
name="disponibilidad"
min="1"
max="5"
class="form-control"
required>

</div>

<button
class="btn btn-success">

Guardar Activo

</button>

</form>

<?php include("../layouts/footer.php"); ?>
<?php

require_once("../../models/Riesgo.php");
require_once("../../models/Activo.php");
require_once("../../../config/session.php");

if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit();
}

$modelRiesgo = new Riesgo();
$modelActivo = new Activo();

$activos = $modelActivo->obtenerTodos();

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}

$riesgo = $modelRiesgo->obtenerPorId($_GET["id"]);

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<h2 class="mb-4">Editar Riesgo</h2>

<form method="POST" action="../../controllers/RiesgoController.php">

    <input type="hidden"
           name="id"
           value="<?= $riesgo["id_riesgo"] ?>">

    <div class="mb-3">

        <label>Activo</label>

        <select name="id_activo"
                class="form-select">

            <?php foreach($activos as $a): ?>

            <option value="<?= $a["id_activo"] ?>"

            <?= ($a["id_activo"]==$riesgo["id_activo"]) ? "selected" : "" ?>>

                <?= $a["nombre"] ?>

            </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="mb-3">

        <label>Amenaza</label>

        <input
        type="text"
        name="amenaza"
        class="form-control"
        value="<?= $riesgo["amenaza"] ?>">

    </div>

    <div class="mb-3">

        <label>Vulnerabilidad</label>

        <input
        type="text"
        name="vulnerabilidad"
        class="form-control"
        value="<?= $riesgo["vulnerabilidad"] ?>">

    </div>

    <div class="row">

        <div class="col-md-6">

            <label>Probabilidad</label>

            <select
            name="probabilidad"
            class="form-select">

            <?php for($i=1;$i<=5;$i++): ?>

                <option value="<?= $i ?>"

                <?= ($i==$riesgo["probabilidad"]) ? "selected" : "" ?>>

                <?= $i ?>

                </option>

            <?php endfor; ?>

            </select>

        </div>

        <div class="col-md-6">

            <label>Impacto</label>

            <select
            name="impacto"
            class="form-select">

            <?php for($i=1;$i<=5;$i++): ?>

                <option value="<?= $i ?>"

                <?= ($i==$riesgo["impacto"]) ? "selected" : "" ?>>

                <?= $i ?>

                </option>

            <?php endfor; ?>

            </select>

        </div>

    </div>

    <br>

    <div class="mb-3">

<label>Descripción del Riesgo</label>

<textarea
name="descripcion_riesgo"
class="form-control"
rows="3"><?= $riesgo["descripcion_riesgo"] ?></textarea>

</div>

<br>

<button
type="submit"
name="actualizar"
class="btn btn-success">

Actualizar Riesgo

</button>

    <a href="index.php"
       class="btn btn-secondary">

        Cancelar

    </a>

</form>

<?php include("../layouts/footer.php"); ?>


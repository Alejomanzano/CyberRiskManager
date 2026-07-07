<?php

require_once("../../models/Activo.php");
require_once("../../../config/session.php");

if (!isset($_SESSION["usuario"])) {
    header("Location: ../login.php");
    exit();
}

$model = new Activo();

if (!isset($_GET["id"])) {
    header("Location: index.php");
    exit();
}

$activo = $model->obtenerPorId($_GET["id"]);

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<h2 class="mb-4">Editar Activo</h2>

<form method="POST" action="../../controllers/ActivoController.php">

    <input
        type="hidden"
        name="id"
        value="<?= $activo["id_activo"] ?>">

    <div class="row">

        <div class="col-md-6 mb-3">

            <label>Nombre</label>

            <input
                type="text"
                name="nombre"
                class="form-control"
                value="<?= $activo["nombre"] ?>"
                required>

        </div>

        <div class="col-md-6 mb-3">

            <label>Tipo</label>

            <input
                type="text"
                name="tipo"
                class="form-control"
                value="<?= $activo["tipo"] ?>"
                required>

        </div>

        <div class="col-md-6 mb-3">

            <label>Propietario</label>

            <input
                type="text"
                name="propietario"
                class="form-control"
                value="<?= $activo["propietario"] ?>">

        </div>

        <div class="col-md-6 mb-3">

            <label>Descripción</label>

            <textarea
                name="descripcion"
                class="form-control"><?= $activo["descripcion"] ?></textarea>

        </div>

        <div class="col-md-4 mb-3">

            <label>Confidencialidad</label>

            <input
                type="number"
                min="1"
                max="5"
                name="confidencialidad"
                class="form-control"
                value="<?= $activo["confidencialidad"] ?>"
                required>

        </div>

        <div class="col-md-4 mb-3">

            <label>Integridad</label>

            <input
                type="number"
                min="1"
                max="5"
                name="integridad"
                class="form-control"
                value="<?= $activo["integridad"] ?>"
                required>

        </div>

        <div class="col-md-4 mb-3">

            <label>Disponibilidad</label>

            <input
                type="number"
                min="1"
                max="5"
                name="disponibilidad"
                class="form-control"
                value="<?= $activo["disponibilidad"] ?>"
                required>

        </div>

    </div>

    <button
        type="submit"
        name="actualizar"
        class="btn btn-success">

        Actualizar Activo

    </button>

    <a href="index.php" class="btn btn-secondary">
        Cancelar
    </a>

</form>

<?php include("../layouts/footer.php"); ?>
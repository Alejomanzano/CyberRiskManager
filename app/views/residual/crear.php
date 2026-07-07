<?php

require_once("../../models/Control.php");

$model = new Control();
$controles = $model->obtenerTodos();

include("../layouts/header.php");
include("../layouts/sidebar.php");

?>

<h2 class="mb-4">Registrar Riesgo Residual</h2>

<form method="POST" action="../../controllers/ResidualController.php">

    <div class="mb-3">

        <label>Control Implementado</label>

        <select name="id_control" class="form-select" required>

            <?php foreach($controles as $c): ?>

            <option value="<?= $c["id_control"] ?>">

                <?= $c["control_propuesto"] ?> (<?= $c["amenaza"] ?>)

            </option>

            <?php endforeach; ?>

        </select>

    </div>

    <div class="row">

        <div class="col-md-6">

            <label>Nueva Probabilidad</label>

            <select id="probabilidad"
                    name="nueva_probabilidad"
                    class="form-select">

                <?php for($i=1;$i<=5;$i++): ?>

                <option value="<?= $i ?>"><?= $i ?></option>

                <?php endfor; ?>

            </select>

        </div>

        <div class="col-md-6">

            <label>Nuevo Impacto</label>

            <select id="impacto"
                    name="nuevo_impacto"
                    class="form-select">

                <?php for($i=1;$i<=5;$i++): ?>

                <option value="<?= $i ?>"><?= $i ?></option>

                <?php endfor; ?>

            </select>

        </div>

    </div>

    <br>

    <div class="card">

        <div class="card-body">

            <h5>Resultado</h5>

            <p>

                Riesgo Residual:
                <strong id="riesgo">1</strong>

            </p>

            <p>

                Reducción:
                <strong id="porcentaje">96%</strong>

            </p>

            <div class="progress">

                <div
                id="barra"
                class="progress-bar"
                style="width:96%">

                96%

                </div>

            </div>

        </div>

    </div>

    <input
    type="hidden"
    id="reduccion"
    name="porcentaje_reduccion"
    value="96">

    <br>

    <button class="btn btn-primary">

        Guardar Riesgo Residual

    </button>

    <a href="index.php"
       class="btn btn-secondary">

        Cancelar

    </a>

</form>

<script>

function calcular(){

let p =
parseInt(document.getElementById("probabilidad").value);

let i =
parseInt(document.getElementById("impacto").value);

let riesgo = p*i;

document.getElementById("riesgo").innerHTML = riesgo;

/*
Tomaremos como riesgo inicial máximo = 25
*/

let reduccion =
((25-riesgo)/25)*100;

reduccion =
Math.round(reduccion);

document.getElementById("porcentaje").innerHTML =
reduccion+"%";

document.getElementById("reduccion").value =
reduccion;

let barra =
document.getElementById("barra");

barra.style.width =
reduccion+"%";

barra.innerHTML =
reduccion+"%";

}

document.getElementById("probabilidad")
.addEventListener("change",calcular);

document.getElementById("impacto")
.addEventListener("change",calcular);

calcular();

</script>

<?php include("../layouts/footer.php"); ?>
<?php

require_once("../../config/session.php");

if(!isset($_SESSION["usuario"])){

    header("Location: login.php");
    exit();

}

include("layouts/header.php");
include("layouts/sidebar.php");

?>

<h2 class="mb-4">

Bienvenido,
<b><?php echo $_SESSION["usuario"]; ?></b>

</h2>

<div class="row">

<div class="col-md-3">

<div class="card shadow stat-card">

<h2>0</h2>

<p>Total Activos</p>

</div>

</div>

<div class="col-md-3">

<div class="card shadow stat-card">

<h2>0</h2>

<p>Total Riesgos</p>

</div>

</div>

<div class="col-md-3">

<div class="card shadow stat-card">

<h2>0</h2>

<p>Riesgos Altos</p>

</div>

</div>

<div class="col-md-3">

<div class="card shadow stat-card">

<h2>0</h2>

<p>Riesgos Críticos</p>

</div>

</div>

</div>

<div class="card mt-5 shadow">

<div class="card-body">

<h4>

Dashboard de Riesgos

</h4>

<p>

Aquí mostraremos los gráficos con Chart.js.

</p>

</div>

</div>

<?php

include("layouts/footer.php");

?>
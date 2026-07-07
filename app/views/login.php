<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CyberRisk Manager</title>

    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <!-- CSS -->

    <link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>

<div class="container-fluid vh-100">

<div class="row h-100">

<!-- LADO IZQUIERDO -->

<div class="col-lg-7 d-none d-lg-flex bg-primary text-white align-items-center justify-content-center">

<div class="text-center">

<h1 class="display-3 fw-bold">

<i class="bi bi-shield-lock-fill"></i>

CyberRisk Manager

</h1>

<p class="lead mt-4">

Sistema de Gestión de Riesgos Cibernéticos

</p>

</div>

</div>

<!-- LADO DERECHO -->

<div class="col-lg-5 d-flex align-items-center justify-content-center">

<div class="card shadow-lg border-0 p-5 login-card">

<h2 class="text-center mb-4">

Iniciar Sesión

</h2>
<?php

if(isset($_GET["error"])){

echo '<div class="alert alert-danger">

Correo o contraseña incorrectos

</div>';

}

?>

<form method="POST" action="../controllers/LoginController.php">

<div class="mb-3">

<label class="form-label">

Correo

</label>

<input
type="email"
name="correo"
class="form-control"
required>

</div>

<div class="mb-4">

<label class="form-label">

Contraseña

</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<button
class="btn btn-primary w-100">

Ingresar

</button>

</form>

</div>

</div>

</div>

</div>

</body>

</html>
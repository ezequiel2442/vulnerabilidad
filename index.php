<?php
session_start();
if (!isset($_COOKIE['user'])) {
    header("Location: login.php");
}
$usuario = $_COOKIE['user'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio - HAKIG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5 text-center">
    <h2>Bienvenido, <?= $usuario ?></h2>
    <div class="d-grid gap-3 col-6 mx-auto mt-4">
        <a href="registro.php" class="btn btn-primary">Registrar Curso</a>
        <a href="cursos.php" class="btn btn-secondary">Ver Cursos</a>
        <a href="salir.php" class="btn btn-danger">Cerrar Sesión</a>
    </div>
</div>
</body>
</html>

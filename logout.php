<?php
// ❌ Vulnerabilidad A07: No se destruye completamente la sesión
// Este archivo simula un cierre de sesión inseguro

session_start(); // Simula que se usó sesión
// Pero no se destruye, ni se eliminan variables
echo "<div style='color:red;'>Sesión supuestamente cerrada, pero no se eliminó correctamente.</div>";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Salir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <a href="login.php" class="btn btn-primary">Volver al Login</a>
    </div>
</body>
</html>

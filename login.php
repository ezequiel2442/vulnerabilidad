<?php
include("db.php");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];
    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
    $result = $conn->query($sql);
    if ($result->num_rows == 1) {
        setcookie("user", $usuario, time() + 3600);
        header("Location: index.php");
    } else {
        $mensaje = "Login incorrecto.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - HAKIG</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">
<div class="container mt-5">
    <h2 class="text-center">Ingreso al Sistema</h2>
    <?php if (isset($mensaje)) echo "<div class='alert alert-danger'>$mensaje</div>"; ?>
    <form method="POST" class="bg-secondary p-4 rounded">
        <div class="mb-3">
            <label class="form-label">Usuario:</label>
            <input type="text" name="usuario" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Clave:</label>
            <input type="password" name="clave" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-light w-100">Ingresar</button>
    </form>
</div>
</body>
</html>

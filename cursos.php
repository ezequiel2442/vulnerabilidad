<?php
include("db.php");
// ❌ Vulnerabilidad A01: Broken Access Control - No se verifica sesión
// session_start();
// if (!isset($_SESSION['usuario'])) {
//     header("Location: login.php");
//     exit();
// }
	
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $password = $_POST['clave']; // ❌ Vulnerabilidad A02: Contraseña sin cifrar

    // Inserta el usuario sin cifrar la contraseña
    $sql = "INSERT INTO usuarios (nombre, clave) VALUES ('$nombre', '$password')";
    if ($conn->query($sql) === TRUE) {
        echo "<div style='color: green;'>Registro exitoso</div>";
    } else {
        echo "<div style='color: red;'>Error: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Registrar Usuario</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="clave" class="form-label">Clave</label>
                <input type="password" class="form-control" name="clave" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
</body>
</html>
	


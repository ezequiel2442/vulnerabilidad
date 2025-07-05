<?php
include("db.php");

// ❌ Vulnerabilidad A07: Fallos en autenticación
// No se verifica si la contraseña está cifrada ni se protege la sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario']; // ❌ No sanitizado
    $clave = $_POST['clave'];     // ❌ No sanitizado

    // Login sin protección, vulnerable a SQLi + sin hashing
    $sql = "SELECT * FROM usuarios WHERE nombre = '$usuario' AND clave = '$clave'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // ❌ No se inicia sesión segura
        echo "<div style='color: green;'>Bienvenido $usuario</div>";
    } else {
        echo "<div style='color: red;'>Credenciales incorrectas</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center">Iniciar Sesión</h2>
        <form method="POST" class="bg-white p-4 border rounded shadow">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input type="text" name="usuario" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Clave</label>
                <input type="password" name="clave" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
        </form>
    </div>
</body>
</html>

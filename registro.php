<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];  // No sanitizado → vulnerable a SQLi
    $nombre = $_POST['nombre'];

    $sql = "INSERT INTO cursos (codigo, nombre) VALUES ('$codigo', '$nombre')";
    $conn->query($sql);

    $msg = "Curso registrado exitosamente.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registrar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="text-center">Registrar Curso</h2>
    <?php if (isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>
    <?php if (isset($msg)) echo "<a href='index.php' class='btn btn-outline-secondary mb-3'>Volver al menú</a>"; ?>
    <form method="POST" class="bg-white p-4 border rounded shadow">
        <div class="mb-3">
            <label class="form-label">Código del curso:</label>
            <input type="text" name="codigo" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nombre del curso:</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Registrar</button>
    </form>
</div>
</body>
</html>

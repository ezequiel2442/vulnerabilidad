<?php
$conn = new mysqli("localhost", "vulnerable", "123456", "vulnerabilidad");

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>

<?php
$servername = "localhost";
$username = "root"; // Ajusta si tu base de datos tiene un usuario distinto
$password = ""; // Ajusta si tienes una contraseña
$dbname = "seguridad_db"; // El nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si la conexión fue exitosa
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

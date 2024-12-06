<?php
// Incluir la conexión
include('db_connection.php');

// Consultar los usuarios
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);

// Verificar si hay usuarios
if ($result->num_rows > 0) {
    // Mostrar los usuarios
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row['id'] . "<br>";
        echo "Nombre: " . $row['nombre'] . "<br>";
        echo "Correo: " . $row['correo'] . "<br><br>";
    }
} else {
    echo "No se encontraron usuarios.";
}

// Cerrar la conexión
$conn->close();
?>

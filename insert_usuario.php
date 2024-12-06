<?php
// Incluir el archivo de conexión a la base de datos
include 'db_connection.php';

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Validación de la fuerza de la contraseña
    if (!is_strong_password($contrasena)) {
        echo "La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un número y un carácter especial.";
        exit(); // Salir si la contraseña no es fuerte
    }

    // Hashear la contraseña utilizando password_hash()
    $contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT);

    // Preparar la consulta para insertar el usuario
    $sql = "INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)";

    // Usar la conexión para preparar la consulta
    if ($stmt = $conn->prepare($sql)) {
        // Enlazar los parámetros a la consulta
        $stmt->bind_param("sss", $nombre, $correo, $contrasena_hash);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Error al registrar al usuario: " . $stmt->error;
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}

// Función para validar la fuerza de la contraseña
function is_strong_password($password) {
    // Expresión regular para validar que la contraseña tenga al menos:
    // - 8 caracteres
    // - 1 letra mayúscula
    // - 1 letra minúscula
    // - 1 número
    // - 1 carácter especial
    $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/";
    
    return preg_match($pattern, $password);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Registro de Usuario</h2>
        <form action="insert_usuario.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" name="correo" id="correo" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" required>
            </div>
            <button type="submit" class="submit-btn">Registrar</button>
        </form>
    </div>
</body>
</html>

<?php
// Incluir el archivo de conexión a la base de datos
include 'db_connection.php';

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

    // Consultar la base de datos para obtener el usuario con el correo proporcionado
    $sql = "SELECT id, contrasena FROM usuarios WHERE correo = ?";
    
    if ($stmt = $conn->prepare($sql)) {
        // Enlazar el parámetro a la consulta
        $stmt->bind_param("s", $correo);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        // Guardar el resultado
        $stmt->store_result();

        // Verificar si el usuario existe
        if ($stmt->num_rows == 1) {
            // Enlazar las columnas a variables
            $stmt->bind_result($id_usuario, $contrasena_hash);
            $stmt->fetch();
            
            // Verificar si la contraseña es correcta
            if (password_verify($contrasena, $contrasena_hash)) {
                // Iniciar sesión y redirigir al usuario a la página principal
                session_start();
                $_SESSION['id_usuario'] = $id_usuario;
                header("Location: dashboard.php");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "No se encontró un usuario con ese correo.";
        }

        // Cerrar la declaración
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="form-container">
        <h2>Iniciar Sesión</h2>
        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="correo">Correo Electrónico</label>
                <input type="email" name="correo" id="correo" required>
            </div>
            <div class="form-group">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" required>
            </div>
            <button type="submit" class="submit-btn">Iniciar Sesión</button>
        </form>
    </div>
</body>
</html>

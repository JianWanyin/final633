<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="insert_usuario.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" required><br><br>

        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required><br><br>

        <input type="submit" value="Registrar">
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de 2FA</title>
</head>
<body>
    <h2>Registrar Código 2FA</h2>
    <form action="insert_2fa.php" method="POST">
        <label for="id_usuario">ID del Usuario:</label>
        <input type="text" name="id_usuario" required><br><br>

        <label for="codigo_2fa">Código 2FA:</label>
        <input type="text" name="codigo_2fa" required><br><br>

        <input type="submit" value="Registrar 2FA">
    </form>
</body>
</html>

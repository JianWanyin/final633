<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Código 2FA</title>
</head>
<body>
    <h1>Agregar Código 2FA</h1>
    <form action="insert_2fa.php" method="POST">
        <label for="id_usuario">ID Usuario:</label>
        <input type="number" name="id_usuario" required><br><br>

        <label for="codigo_2fa">Código 2FA:</label>
        <input type="text" name="codigo_2fa" required><br><br>

        <label for="expiracion">Fecha de Expiración:</label>
        <input type="datetime-local" name="expiracion" required><br><br>

        <button type="submit">Guardar</button>
    </form>
</body>
</html>

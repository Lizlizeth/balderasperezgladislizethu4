<?php
require_once 'db_conexion.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Contactanos</title>
</head>
<body>
        <h2>Envianos tu Mensaje</h2>
        <form action="mail.php" id="formRegistro" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $_SESSION['nombre']?>" required readonly>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']?>"required readonly>
            </div>
            <div class="form-group">
                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje" rows="4" cols="50" placeholder="Escribe tu mensaje"></textarea>
            </div>
            <button type="submit" class="boton-enviar">Enviar</button>
            <a href="session.php" class="inicia-sesion">Regresar</a>
        </form>
</body>
</html>
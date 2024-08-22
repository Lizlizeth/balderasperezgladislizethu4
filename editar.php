<?php
require_once 'db_conexion.php';
session_start();

$GLOBALS['$nombre'] = "";
$GLOBALS['$email'] = "";
$GLOBALS['$password'] = "";

if (isset($_POST['buscar'])) {

    $email = $_POST['email'];

    $query = $cnnPDO->prepare('SELECT * from users WHERE email =:email');
    $query->bindParam(':email', $email);

    $query->execute();
    $count = $query->rowCount();
    $campo = $query->fetch();

    if ($count) {
        $GLOBALS['$nombre'] = $campo['nombre'];
        $GLOBALS['$email'] = $campo['email'];
        $GLOBALS['$password'] = $campo['password'];

    }

}


if (isset($_POST['update'])) {
    $email = $_SESSION['email'];
    $nombre = $_POST['nombre'];
    $password = $_POST['password'];

    if (!empty($nombre)) {
        $sql = $cnnPDO->prepare(
            'UPDATE users SET nombre = :nombre WHERE email = :email');
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':email', $email);
        $sql->execute();
        unset($sql);
        $_SESSION['nombre'] = $nombre;
    }

    if (!empty($password)) {
        $sql = $cnnPDO->prepare(
            'UPDATE users SET password = :password WHERE email = :email');
        $sql->bindParam(':password', $password);
        $sql->bindParam(':email', $email);
        $sql->execute();
        unset($sql);
        $_SESSION['email'] = $email;
    }

    if (!empty($nombre) && !empty($password)) {
        $sql = $cnnPDO->prepare(
            'UPDATE users SET nombre = :nombre, password = :password WHERE email = :email');
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':password', $password);
        $sql->bindParam(':email', $email);
        $sql->execute();
        unset($sql);
        unset($cnnPDO);
        $_SESSION['email'] = $email;
    }
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Crear Cuenta</title>
</head>

<body>
    <h2>Actualizar Datos</h2>
    <p style="text-align: center;">Para actualizar tus datos, primero introduce tu correo y buscalo y despues podras modificar los datos</p>
    <form id="formRegistro" method="post">
        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" value="<?php echo$GLOBALS['$nombre'];?>">
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" placeholder="Introduce tu correo electronico" required value="<?php echo$GLOBALS['$email'];?>">
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password">
        </div>
        <button type="submit" name="buscar" class="boton-enviar">Buscar</button>
        <button type="submit" name="update" class="boton-enviar" style="margin-top: 5px;">Actualizar</button>
        <a href="session.php" class="inicio">Inicio</a>
    </form>
</body>

</html>
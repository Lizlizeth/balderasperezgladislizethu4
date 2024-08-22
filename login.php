<?php
session_start();
require 'db_conexion.php';
# BUSCAR Username y Password
if (isset($_POST['login'])) {
  $email=$_POST['email'];
  $password = $_POST['password'];

  $select = $cnnPDO->prepare('SELECT * from users WHERE email =? and password=?');

  $select->execute([$email, $password]);
  $count = $select->rowCount();
  $campo = $select->fetch();

  if ($count) {   
    
    $_SESSION['nombre'] = $campo['nombre'];
    $_SESSION['email'] = $campo['email'];
    // $_SESSION['img'] = $campo['img'];
    header('location:session.php');
  }
}
# Termina Código de BUSCAR
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form id="formRegistro" method="post">
        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" name="login" class="boton-enviar">Iniciar Sesion</button>   
    </form>
</body>
</html>
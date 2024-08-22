<?php
require_once 'db_conexion.php';
if (isset($_POST['registrar'])) 
{  
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

	
	if (!empty($nombre) && !empty($email) && !empty($password)){
		  
			$sql=$cnnPDO->prepare("INSERT INTO users
			(nombre,email, password ) VALUES (:nombre, :email, :password)");
		
			$sql->bindParam(':nombre',$nombre);
			$sql->bindParam(':email',$email);
			$sql->bindParam(':password',$password);
			$sql->execute();
			unset($sql);
			unset($cnnPDO);
            header('location:index.html');		
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
        <h2>Crear Cuenta</h2>
        <form id="formRegistro" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="registrar" class="boton-enviar">Registrar</button>
            <a href="login.html" class="inicia-sesion">Iniciar Sesion</a>
        </form>
</body>
</html>
<?php

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

$mensaje = "Este mail fue enviado por el cliente: " . $nombre . "\n";
$mensaje .= "Su correo es: " . $email . "\n";
$mensaje .= "Mensaje: " . $mensaje . "\n";

$destinatario = "21045166@alumno.utc.edu.mx";
$asunto = "Correo enviado desde la web LipGloss";

mail($destinatario, $asunto, $mensaje);

header('Location:alerta.html');

?>





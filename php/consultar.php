<?php

$nombre = $_POST["nombre_txt"];
$email = $_POST["email_txt"];
$consultita = $_POST["consulta_txt"];

include ("conexion.php");
$consulta = "INSERT INTO tb_consultas(nombre,email,consulta) VALUES('$nombre','$email','$consultita')";
$ejecutar_consulta = $conexion->query(utf8_encode($consulta));
if ($ejecutar_consulta) {
    $mensaje = "Se ha enviado de manera correcta la consulta, pronto nos estaremos poniendo en contacto con usted.";
} else {
    $mensaje = "No se enviado de manera correcta la consulta, por favor intente de nuevo más tarde.";
}

$conexion->close();
\header("Location: ../index.php?op=contacto&mensaje=$mensaje");
?>
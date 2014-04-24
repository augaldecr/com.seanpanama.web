<?php

$cedula = $_POST["cedula_txt"];
$nombre = $_POST["nombre_txt"];
$apellido1 = $_POST["apellido1_txt"];
$apellido2 = $_POST["apellido2_txt"];
$email = $_POST["email_txt"];
$telefono = $_POST["telefono"];
$provincia = $_POST["provincia_txt"];

include ("conexion.php");
$consulta = "SELECT * FROM tb_tutores WHERE cedula='$cedula'";
$ejecutar_consulta = $conexion->query($consulta);
$num_regs = $ejecutar_consulta->num_rows;

if ($num_regs == 0) {
    $consulta = "INSERT INTO tb_tutores(cedula,nombre,apellido1,apellido2,email,telefono,provincia) "
            . "VALUES('$cedula','$nombre','$apellido1','$apellido2','$email','$telefono','$provincia')";
    $ejecutar_consulta = $conexion->query(utf8_encode($consulta));
    if ($ejecutar_consulta) {
        $mensaje = "Se ha ingresado de manera correcta el tutor con la cédula: <b>$cedula</b>.";
    } else {
        $mensaje = "No se ha dado de alta el tutor con la cédula: <b>$cedula</b>.";
    }
} else {
    $mensaje = "Ya existe registrado un tutor con la cédula: <b>$cedula</b>";
}

$conexion->close();
\header("Location: ../index.php?op=registro&mensaje=$mensaje");
?>


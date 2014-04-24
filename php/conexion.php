<?php
function conectarse(){
    $host="localhost";
    $user="db_sean";
    $password="It2014*";
    $database="db_sean";
    $conectar = new mysqli($host, $user, $password, $database) or die("No se pudo conectar a la base de datos de MySQL");
    return $conectar;
}

$conexion = \conectarse();
?>

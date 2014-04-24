<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Tutores registrados</h1>
        <table>
            <tr>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Primer apellido</th>
                <th>Segundo apellido</th>
                <th>Email</th>
                <th>Telefono</th>
                <th>Provincia</th>
                <th>Fecha de registro</th>
            </tr>
            <?php
            include ("php/conexion.php");
            $conexion2 = conectarse();
            $consulta_tutores = "SELECT cedula, nombre, apellido1, apellido2, email, telefono, provincia, fecha_registro FROM tb_tutores";
            $ejecutar_consulta_tutores = $conexion2->query($consulta_tutores);

            //$registro_tutores = $ejecutar_consulta_tutores->fetch_array();
            //echo var_dump($registro_tutores);
            //echo "<tr><td>" . $registro_tutores["cedula"] . "</td></tr>";
            /* for ($i = 0; $i <= count($registro_tutores); $i++) {
              echo "<tr>";
              for ($j = 1; $j < count($registro_tutores[$i]); $j++) {
              echo "<td>" . $registro_tutores[$i]["cedula"] . "</td><";
              }
              echo "</tr>";
              } */
            while ($row = mysqli_fetch_row($ejecutar_consulta_tutores)) {
                echo "<tr>";
                for ($i = 0; $i <= count($row); $i++) {
                    echo "<td>" . $row[$i] . "</td>";
                }
                echo "</tr>";
            }
            ?>
        </table>
        <h1>Tutores registrados</h1>
        <?php
        ?>
    </body>
</html>

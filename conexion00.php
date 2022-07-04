<!DOCTYPE html>
<html lang="es">
    <title> Conexión PHP </title>
    <head>
        <link rel="icon" href="resources/icontrol.png" type="image/png">
        <meta charset="utf-8">
        <style>
            body {background-color: #bba2ff}
            table {margin: auto; width: 900px; border-collapse: collapse}
            table, tr, th, td {border: 1px solid gray; background-color: black;}
            td {width: 125px; color: #ffcc00;} 
            th{color:white}
        </style>
    </head>
    <body>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "pizzas";

            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name);

            if (mysqli_connect_errno())
            {
                printf("ERROR: %u - %s", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            mysqli_set_charset($conectar, "utf8");
            $consultar = "SELECT * FROM pedidos";

            if ($resultado = mysqli_query($conectar, $consultar))
            {
                printf("<table><tr><th>C&oacutedigo</th> <th>Tipo</th> <th>Tama&ntilde;o</th>
                <th>Masa</th> <th>Queso</th> <th>Extra</th> <th>Precio</th></tr>");
                while ($fila = mysqli_fetch_row($resultado))
                {
                    printf("<tr><td>%d</td> <td>%s</td> <td>%s</td> <td>%s</td> <td>%s</td>
                    <td>%s</td> <td>$%d</td> </tr>", $fila[0], $fila[1], $fila[2], $fila[3], 
                    $fila[4], $fila[5], $fila[6]);
                }
                printf("</table>");

                mysqli_free_result($resultado);
            }

            mysqli_close($conectar);
        ?>
    </body>
    <footer><h6 style="text-align: center;"> By: @iAntonAMC </h6></footer>
</html>
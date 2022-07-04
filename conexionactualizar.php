<!DOCTYPE html>
<html>
    <head>
        <title> Actualizado - PHP </title>
        <style>
            body{background: #bba2ff;}
            table{margin: auto; width: 900px;border-collapse: collapse;}
            table,tr,th,td{border: 1px solid black; background-color: #663399;}
            td{width: 125px;color: #FFCC00} th {color: white}
        </style>
    </head>
    <body>
        <nav>
            <ul>
                <li><a href="busqueda_insertar.html"> Volver </a></li>
            </ul>
        </nav>
        <?php
            $bd_host = "127.0.0.1";
            $bd_user = "root";
            $bd_pass = "";
            $bd_name = "pizzas";

            $codigo = (int)$_POST["txtCodigo"];
            $ingre = htmlspecialchars($_POST["txtareaIngre2"]);

            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name, 3306);
            if (mysqli_connect_errno())
            {
                printf("ERROR: %u - %s", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            mysqli_set_charset($conectar, "utf8");
            $actualizar = "UPDATE pedidos SET Ingredientes = '$ingre' WHERE Codigo = '$codigo'";

            if ($resultado = mysqli_query($conectar, $actualizar))
            {
                if (mysqli_affected_rows($conectar) == 0)
                {
                    printf("El código ingresado no existe");
                }
                else
                {
                    printf("Se han actualizado %u registros", mysqli_affected_rows($conectar));
                } 
            }
            else
            {
                printf("ERROR! Al actualizar la BD");
            }
            mysqli_close($conectar);
        ?>
    </body>
</html>
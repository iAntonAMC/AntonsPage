<!DOCTYPE html>
<html>
    <head>
        <title> Insertar registros con PHP y SQL </title>
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
            # Variables que se insertan del formulario
            $tipo = htmlspecialchars($_POST["txtTipo"]);
            $tama = htmlspecialchars($_POST["txtTama"]);
            $masa = htmlspecialchars($_POST["txtMasa"]);
            $queso = htmlspecialchars($_POST["txtQueso"]);
            $ingre = htmlspecialchars($_POST["txtareaIngre2"]);
            $precio = (int)$_POST["txtPrecio"];
            # Abre una conexión a la base de datos asignada en bd_name
            # Y asigna la conexión a la variable variable conectar
            $conectar = mysqli_connect($bd_host, $bd_user, $bd_pass, $bd_name, 3306);

            if (mysqli_connect_errno())
            {
                # Muestra un mensaje de error si la conexión es rechazada
                printf("ERROR: %U - %S", mysqli_connect_errno(), mysqli_connect_error());
                exit();
            }
            # Establecer el conjunto de carácteres que usa el cliente
            mysqli_set_charset($conectar, "utf8");
            # Insertar los datos extraídos del formulairo a la tabla pedidos:
            $insertar = "INSERT INTO pedidos(Tipo, Tamano, Masa, Queso, Ingredientes, Precio) VALUES
            ('$tipo', '$tama', '$masa', '$queso', '$ingre','$precio')";

            # Realiza la consulta para saber si se insertaron los datos:
            if ($resultado = mysqli_query($conectar, $insertar))
            {
                printf("Registro almacenado en la BD");
            }
            else
            {
                printf("ERROR - No se pudo almacenar el dato");
            }

            # Cerrar la conexión previamente establecida en conectar:
            mysqli_close($conectar);
        ?>
    </body>
    <footer><h6 style="text-align: center;"> By: @iAntonAMC </h6></footer>
</html>
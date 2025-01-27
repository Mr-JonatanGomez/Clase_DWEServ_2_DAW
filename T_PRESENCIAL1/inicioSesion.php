<?php
session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tienda</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<?php
/* CARGAMOS LOS DATOS A VACIO */


$archivo= "archivo.txt";
$userEncontrado=false;

if (isset($_REQUEST["enviar"])) {
    /* SI CARGAMOS ANTES DE QUE SE ENVIE LOS DATOS DA ERROR AL NO EXISTIR */
        $nombre = trim(strip_tags($_REQUEST["nombre"]));
        $pass = trim(strip_tags($_REQUEST["password"]));

        $abrirArchivo= fopen($archivo, "r");/* para crear si no existe */

        while(!feof($abrirArchivo)){
            $linea=fgets($abrirArchivo);
            $lista=explode(" ",$linea);

/* COMPROBAMOS SI LO INTRODUCIDO POR USER Y ARCHIVO COINCIDE */
            if (($lista[0])==$nombre && ($lista[1])) {
                
                $userEncontrado = true;
                break;
            }
        }



        fclose($abrirArchivo);

        if ($userEncontrado) {
            echo"BIENVENIDO $nombre";
            #tambien iniciamos session para coger el nombre para el pedido, que no haya fallos 
            $_SESSION["nombre"]=$nombre;
            /* 
            compruebo que la SESION SE HA GUARDADO
            echo"ECHO DE SESION NOMBRE lineas 50 y 51";
            echo $_SESSION["nombre"]; 
            
            */

        // Redirige al usuario a la página deseada
        header("Location: menuInicial.php");
        exit(); // Finaliza el script para evitar que se siga ejecutando código

        


        }else{
            echo"EL USUARIO NO EXISTE, o las CREDENCIALES SON INCORRECTAS, introduzcalo de nuevo";
?> <!-- CIERRE PARA METER FORM -->        
            
            <form action="#" method="post">
            <label for="nombre">
                <div class="tipo">
                    <strong>Nombre</strong>
                </div>
                <input type="text" name="nombre">
            </label>
    
            <label for="password">
                <div class="tipo">
                    <strong>Password</strong>
                </div>
                <input type="text" name="password">
            </label>
    
            <label for="enviar">
                <input class="submit" type="submit" name="enviar" value="ENVIAR" id="enviar">
            </label>
        </form>
<?php /* APERTURA PARA CERRAR */
        }
    }else{
        /* CERRAMOS PHP PARA METER HTML DEL FORM SI NO CUMPLE EL ENVIO */
?>
        <form action="#" method="post">
        <label for="nombre">
            <div class="tipo">
                <strong>Nombre</strong>
            </div>
            <input type="text" name="nombre">
        </label>

        <label for="password">
            <div class="tipo">
                <strong>Password</strong>
            </div>
            <input type="text" name="password">
        </label>

        <label for="enviar">
            <input class="submit" type="submit" name="enviar" value="ENVIAR" id="enviar">
        </label>
    </form>

        <!-- ABRIMOS PHP PARA CERRAR EL ELSE -->
<?php

    }

?>








    
</body>
</html>
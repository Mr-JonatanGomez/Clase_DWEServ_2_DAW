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

        $fp= fopen($archivo, "r");/* para crear si no existe */

        while(!feof($fp)){
            $linea=fgets($fp);
            $lista=explode(" ",$linea);

/* COMPROBAMOS SI LO INTRODUCIDO POR USER Y ARCHIVO COINCIDE */
            if (($lista[0])==$nombre && ($lista[1])) {
                
                $userEncontrado = true;
                break;
            }
        }



        fclose($fp);

        if ($userEncontrado) {
            echo"BIENVENIDO CABRONAZO";
        }else{
            echo"EL USUARIO NO EXISTE, o las CREDENCIALES SON INCORRECTAS";
        }
    }




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
</body>
</html>
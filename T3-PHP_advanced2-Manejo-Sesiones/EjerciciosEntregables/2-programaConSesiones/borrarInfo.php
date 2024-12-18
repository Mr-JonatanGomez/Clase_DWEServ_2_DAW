<?php
    session_start();

    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Info</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <!-- 
<li>session_start(); inicia y mantiene sesion</li>
    <li>$_SESSION(['nombreVariable']); registra variable de sesion</li>
    <li>unset($_SESSION['nombreVariable']); elimina el contenido de una variable de sesion, por ejemplo un producto del carrito </li>
    <li>if (isset($_SESSION['nombreVariable'])); comprueba si una variable esta registrada</li>
    <li>session_destroy(); cierra sesión</li>
    <li></li> -->
    
<?php

    if (isset($_REQUEST["deleteName"])) {
        unset($_SESSION["nombre"]);
?>
        <div class="container">
            <h2>Sesion de Nombre borrada</h2>
            <a href="./index.php">volver al menú</a>
        </div>
<?php
    }else if (isset($_REQUEST["deleteSurname"])) {
        unset($_SESSION["apellidos"]);
?>
        <div class="container">
            <h2>Sesion de Apellidos borrada</h2>
            <a href="./index.php">volver al menú</a>
        </div>
<?php
    }else if (isset($_REQUEST["deleteBoth"])) {
        unset($_SESSION["nombre"]);
        unset($_SESSION["apellidos"]);
        session_destroy();
?>
        <div class="container">
            <h2>Todas las Sesiones han sido borradas</h2>
            <a href="./index.php">volver al menú</a>
        </div>
<?php
    }else{
?>



<div class="container">
    <h1>Eliminar datos</h1>
    <h2>Elija opcion</h2>
    <form action="" method="post">
        
        <input class="boton" type="submit" name="deleteName" value="Borrar Nombre Sesión">
        <input class="boton" type="submit" name="deleteSurname" value="Borrar Apellidos Sesión">
        <input class="boton" type="submit" name="deleteBoth" value="Borrar Todas las Sesionesn">
        <br><br><a href="./index.php">volver al menú</a>
        
    </form>
</div>
<?php
    }
?>

</body>
</html>
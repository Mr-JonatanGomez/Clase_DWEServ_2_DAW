<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver INFO</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="container">
        <h2>Los datos de sesion</h2>
<?php
    echo"<div class='cont1'> ";
        if (isset($_SESSION['nombre'])) {
            echo "Su nombre en sesión son: ". $_SESSION['nombre'];
        }else {
            echo "no hay sesión para ello";
        }

    echo"</div> ";
    echo"<div class='cont2'> ";
    if (isset($_SESSION["apellidos"])) {
        
        echo "Su apellidos en sesión son: ". $_SESSION['apellidos'];
    }else {
        echo "No ha introducido un apellido y no hay sesión para ello";
    }
    echo"</div> ";


?>
        <div class="cont3">
            <a href="./index.php">volver al menú</a>
        </div>
    </div>
<!-- 
<li>session_start(); inicia y mantiene sesion</li>
    <li>$_SESSION(['nombreVariable']); registra variable de sesion</li>
    <li>unset($_SESSION['nombreVariable']); elimina el contenido de una variable de sesion, por ejemplo un producto del carrito </li>
    <li>if (isset($_SESSION['nombreVariable'])); comprueba si una variable esta registrada</li>
    <li>session_destroy(); cierra sesión</li>
    <li></li>
-->
</body>
</html>
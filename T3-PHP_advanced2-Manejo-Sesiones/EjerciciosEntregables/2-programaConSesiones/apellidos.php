<?php
    session_start();
    if (isset($_REQUEST["apellidosEnviar"])) {
        $apellidos = $_REQUEST["apellidos"];
        $_SESSION["apellidos"]=$apellidos;
    }
?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Apellidos</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
<?php
    if (!isset($_REQUEST['apellidos'])) {
?>
    <div class="container">
        <form action="" method="post">
            <h2>Introduce tus apellidos</h2>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" id="apellidos" required>
            <input class="boton" type="submit" name="apellidosEnviar" value="Enviar Apellidos">
        </form>
    </div>
<?php
    } else {
?>
        <div class="container">
            <h2>apellidos introducidos con exito</h2>
            <a href="./index.php">volver al menú</a>
        </div>
        <!-- echo $_SESSION["apellidos"]; -->
<?php
    }
?>


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
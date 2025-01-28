<?php
session_start();

if (isset($_REQUEST["cerrarSesion"])) {
    unset($_SESSION["nombre"]);
    session_destroy();
    echo "SESION CERRADA CORRECTAMENTE";

    header("Location: inicioSesion.php");
    exit(); // Finaliza el script para evitar que se siga ejecutando código
} 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav>
    <form action="#" method="post">

        <a href="./pedido.php">Hacer pedido</a>
        <a href="./mostrar.php">Mostrar pedido</a>
        <a href="./calcular.php">Calcular precio del Pedido</a>
        <a href="./sorteo.php">Sorteo del Pedido</a>
        <input type="submit" name="cerrarSesion" id="cerrarSesion" value="CERRAR SESION">

    </form>
<?php




?>


        </nav>
</body>
</html>
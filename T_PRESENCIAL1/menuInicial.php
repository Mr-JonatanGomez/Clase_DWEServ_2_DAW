<?php
session_start();

if (isset($_REQUEST["cerrarSesion"])) {
    unset($_SESSION["nombre"]);
    session_destroy();
    echo "SESION CERRADA CORRECTAMENTE";

    header("Location: index.php");
    exit(); // Finaliza el script para evitar que se siga ejecutando código
} 



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu principal</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style.css">

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
<?php
    session_start();

# COMPROBAR SI SE HA ENVIADO NOMBRE
    if (isset($_REQUEST["enviarNombre"])) {
        $nombre = $_REQUEST["nombre"]; //guardamos nombre
        $_SESSION["nombre"] = $nombre; // guardamos nombre en sesion tambien
        //en una tienda cada sesion seria un producto
        // directamente -> $_SESSION["nombre"] = $_REQUEST["nombre"]; sin guardar nombre en variable
        
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>nombre</title>
        <link rel="stylesheet" href="./style.css">
    </head>
    <body>
<?php


    if (!isset($_REQUEST["nombre"])) {
    
?>
    <div class="container">
        <form action="" method="post">
            <h2>Introduce tu nombre</h3>
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
            <input class="boton" type="submit" name="enviarNombre" value="enviarNombre">
        </form>
    </div>

<?php
    }else {
        if ($nombre=="") {
            echo '<div class="container">';
            unset($_SESSION[$nombre]);
            /* session_destroy(); */
            echo "El nombre en vacio, no se puede introducir, por favor introduzca de nuevo<br><br>";
            echo'<a href="./nombre.php">Escribir nombre</a>';
            echo "</div>";
        }else{
?>
    <div class="container">
        <h2>Nombre introducido con exito</h2>
        <a href="./index.php">volver al menú</a>
    </div>
    <!-- echo $_SESSION['nombre']; -->

<?php
        }
    }
?>




<!-- 
<label for="nombre">Nombre</label>
<input type="text" id="nombre" name="nombre">
<input type="submit" name="enviarNombre" value="enviarNombre">


<li>session_start(); inicia y mantiene sesion</li>
    <li>$_SESSION(['nombreVariable']); registra variable de sesion</li>
    <li>unset($_SESSION['nombreVariable']); elimina el contenido de una variable de sesion, por ejemplo un producto del carrito </li>
    <li>if (isset($_SESSION['nombreVariable'])); comprueba si una variable esta registrada</li>
    <li>session_destroy(); cierra sesión</li>
    <li></li> -->
</body>
</html>
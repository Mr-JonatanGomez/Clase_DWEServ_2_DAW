<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
    <div class="container">
        <h1>Menú principal</h1>
        <h2>Elija opcion</h2>
        <div class="main">
            <button class="boton" onclick="window.location.href='./nombre.php'">Escribir nombre</button>
            <button class="boton" onclick="window.location.href='./apellidos.php'">Escribir Apellidos</button>
            <button class="boton" onclick="window.location.href='./ver.php'">Mostrar Nombre y Apellidos</button>
            <button class="boton" onclick="window.location.href='./borrarInfo.php'">Borrar Info</button>
        </div>
    </div>



</body>
</html>
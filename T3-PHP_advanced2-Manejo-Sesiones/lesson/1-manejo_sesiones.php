<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>
        manejo sesiones
    </h1>

    <ul>

    <li>session_start(); inicia y mantiene sesion</li>
    <li>$_SESSION(['nombreVariable']); registra variable de sesion</li>
    <li>unset($_SESSION['nombreVariable']); elimina el contenido de una variable de sesion, por ejemplo un producto del carrito </li>
    <li>if (isset($_SESSION['nombreVariable'])); comprueba si una variable esta registrada</li>
    <li>session_destroy(); cierra sesión</li>
    <li></li>


        <li>Mantener sesion iniciada. Se guarda en server</li>
        <li>Mantener carrito durante x tiempo. Se guarda en server</li>
        <li>Autenticar users. Se guarda en server</li>
        <li>Cookies. se guardan en cliente</li>
    </ul>
<h2>session_start() va antes del DOCTYPE envuelto en php</h2>

    <?php
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$archivoDatos = "archivoDatos.txt";

if (file_exists($archivoDatos)) {
    # echo"EXISTE...abriendo";
    $archivo = fopen($archivoDatos, "r+");
}else{
    # echo "NO EXISTE, creando...";
    $archivo = fopen($archivoDatos, "a+");
}

if (isset($_REQUEST["enviar"])) {
    $nombre= trim($_REQUEST["nombre"]);
    $nombre= trim($_REQUEST["apellido1"]);
    $nombre= trim($_REQUEST["apellido2"]);
    $nombre= trim($_REQUEST["telefono"]);
    $nombre= trim($_REQUEST["email"]);
    
//todo seguir por aqui, guardar todo en array y escribir con fputs al archivo txt
}

?>


    <form action="#" method="post">
        <h2>INTRODUCION DATOS</h2>
        <input type="text" name="nombre" placeholder="Nombre1" required>
        <input type="text" name="apellido1" placeholder="Apellido1" required>
        <input type="text" name="apellido2" placeholder="Apellido2">
        <input type="number" name="telefono" placeholder="Telefono">
        <input type="email" name="email" placeholder="Email">
        <input type="submit" name="enviar" id="enviar" value="Guardar Datos">
    </form>

    <form action="#" method="post">
        <h2>BUSCAR</h2>
        <input type="text" name="nombreBuscado" placeholder="Nombre1" required>
        
        <input type="submit" name="buscar" id="buscar" value="Buscar">
    </form>
</body>
</html>
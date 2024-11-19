<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php 

$nombre = $_REQUEST["nombre"];
$password = $_REQUEST["password"];
echo("recuerda que el metodo GET te expondrá toda tu info en la barra 
<br> <br>
Hola, que tengas un gran dia estimado $nombre <br>
y tu password es $password")

?>


</body>
</html>
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
$opcionesCasa= $_REQUEST["extras"];

echo("recuerda que el metodo GET te expondrá toda tu info en la barra 
<br> <br>
Hola, que tengas un gran dia estimado $nombre <br>
y tu password es $password");


echo("<br> Tus extras de la casa son:<br>");
foreach ($opcionesCasa as $item) {
    echo("$item<br>");
}

$numElementosArray = count($opcionesCasa); 
for ($i=0; $i <$numElementosArray ; $i++) { 

}

echo("<br><br>Los botones son boolean y se puede controlar si se a pulsado <br>
o no se ha pulsado <br>");

?>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

$numDado = ["","uno", "dos", "tres", "cuatro", "cinco", "seis"];
$dado = rand(1,6);
print "     <div><img src=\"./exercises-T2/img/$dado.png\" width=\"140\"></div><br>";
print "     <p>Ha sacado un <strong>$numDado[$dado]</strong>.</p>\n";



$animales = ["ballena","caballito-mar","camello","cebra","elefante","hipopotamo","jirafa","leon","leopardo","medusa","mono","oso-blanco","oso","pajaro","pinguino","rinoceronte","serpiente","tigre","tortuga-marina","tortuga"];

echo implode(" , ", $animales); // imprime el array

echo "<br><br>En tu array existen ".count($animales)." animales<br>Ahora vamos a sacar un animal aleatorio:<br>";
$animalito = rand(0,count($animales)-1);
echo "<div><img src=\"./exercises-T2/img/$animales[$animalito].svg\" height=\"150\"></div><br>";
?>

</body>
</html>
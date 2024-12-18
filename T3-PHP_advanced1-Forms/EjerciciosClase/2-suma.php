<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$num1 = $_REQUEST["num1"];
$num2 = $_REQUEST["num2"];

$resultado = $num1 +$num2;

echo("Tu resultado de sumar $num1 y $num2, es ni más ni menos que $resultado")


?>
    
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

/* function convertir($moneda){
    $resultado = $moneda*1.05;
    echo("Los $moneda €, son equivalentes a $resultado US$");
    return $resultado;
}

if (isset($_REQUEST["Aceptar"])) {
    $euritos= $_REQUEST["euros"];
    convertir($euritos);
} */

$euritos= $_REQUEST["euros"];
    $resultado = $euritos*1.05;
    echo("Los $euritos €, son equivalentes a $resultado US$");

?>
</body>
</html>
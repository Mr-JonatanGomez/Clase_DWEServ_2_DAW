<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// Muestra los números del 320 al 160, contando de 20 en 20 utilizando un bucle for.
    $numero=320;
    for ($numero; $numero >= 120 ; $numero--) { 
        if ($numero % 20 == 0 && $numero != 120) {
            echo $numero .", ";
        }elseif ($numero == 120) {
            echo $numero .". FIN";
        }
    }
    
    ?>
</body>
</html>
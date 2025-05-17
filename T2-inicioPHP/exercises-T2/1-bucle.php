<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    // Muestra los números múltiplos de 5 de un bucle de 0 a 100 utilizando while.

$numero=1;
    while ($numero <= 100) {
    if ($numero%5==0&& $numero!=100) {
        print $numero .", ";
    }elseif ($numero==100){
        print $numero .". ";
    }
    $numero++;
    
}
//muy entretenido y divertido de hacer

    ?>
</body>
</html>
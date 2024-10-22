<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    ?>
</body>
</html> -->

<?php
// Generar tres números aleatorios entre 5 y 20
$numeros = [];
for ($i = 0; $i < 3; $i++) {
    $numeros[] = rand(5, 20);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número y Cuadrado</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    
    
    <?php
    // Un programa que genere 2 tiradas de 3 dados(simulando 2 jugadores). 
    //Muestre las dos tiradas y me diga cual tiene mayor puntuación(sumando las tiradas)
    $puntosJ1=0;
    $puntosJ2=0;
    
    print "<h1>Turno Jugador 1</h1>";

    for ($i=0; $i <3 ; $i++) { 
        $dado= rand(1,6);
        print "<img src='./img/$dado.png' width=100 height=100/>";
        $puntosJ1+= $dado;
        
    }
    print "<br>";
    print "<h3>El jugador 1 ha tenido $puntosJ1 puntos</h3>";

    print "<hr>";

    print "<h2>Turno Jugador 2</h2>";

    for ($i=0; $i <3 ; $i++) { 
        $dado= rand(1,6);
        print "<img src='./img/$dado.png' width=100 height=100/>";
        $puntosJ2+= $dado;
        
    }
    print "<br>";
    print "<h3>El jugador 2 ha tenido $puntosJ2 puntos</h3>";
    
    print "<hr>";
    print "<hr>";

    if ($puntosJ1 > $puntosJ2) {
        print "<h2>El ganador ha sido jugador1 con una diferencia de ".$puntosJ1-$puntosJ2 ." puntos</h2>";
    }elseif ($puntosJ1 < $puntosJ2) {
        print "<h2>El ganador ha sido jugador2 con una diferencia de ".$puntosJ2-$puntosJ1 ." puntos</h2>";
    }else{
        print "<h2>La partida ha finalizado con empate</h2>";
    }
    
    ?>    
    
</body>
</html>

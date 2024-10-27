<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<?php // && (and)  ||(OR)  !(NOT)
//print igual que en java for, if, elseif, while

$diaMes = rand(1,31);
echo $diaMes."<br>";

if ( $diaMes < 7 ){
     echo "Estamos a primeros de mes<br>\n";
}elseif ( $diaMes == 15 || $diaMes == 16 ){
    echo "Justo estan en mitad, 15 o 16<br>\n";
}elseif ( $diaMes >= 7 && $diaMes <=23 ){
    echo "Es mediados de mes ( excepto los casos 15,16, que justo es la mitad<br>\n";
}else { 
    echo "Es final de mes<br>\n";
}

echo "Los bucles while, do while, no los voy a mostrart, es lo mismo que Java y JavaScript<br>\n";

echo " Vamos con los While para el factorial<br>\n";
$numero = 6; //ejemplo de factorial de numero 5
$numero2 = $numero;
$factorial = 1;
while ( $numero > 1 ) {
   $factorial = $factorial * $numero;
   $numero = $numero - 1;
}
echo "El factorial de " . $numero2 . " es " . $factorial."<br>\n";

?>


</body>
</html>
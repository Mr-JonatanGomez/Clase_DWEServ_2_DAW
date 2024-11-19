<?php 

echo "con <b>define('radio', 3.33);</b> estariamos definiendo el valor de una CONSTANTE \n";
define("radio", 3.33); // constantes
print "<p>El valor de radio es " . radio . "</p>\n";


$valor = 9;
$valor++; // ++ suma 1   -- resta1
print "<p>" . $valor++. "</p>\n";
print "<p>" . $valor--. "</p>\n";

$numeroDecimal = 1.9465658;
echo "Para redondear un numero usamos <b>round</b>(numero, cantidadDecimales) \n <br> Antes de redondear el numero es $numeroDecimal";
$numeroDecimal = round($numeroDecimal,2);
echo "y ahora tras redondearlo es $numeroDecimal\n<br><br>";

$numeroDecimal2= $numeroDecimal;
echo "Para redondear un numero al entero mas cercano por encima usamos <b>ceil</b>(numero, cantidadDecimales) \n<br>";
$numeroDecimal = ceil($numeroDecimal);
echo "El numero con ceil es $numeroDecimal\n<br><br>";

echo "Para redondear un numero al entero mas cercano por debajo usamos <b>floor</b>(numero, cantidadDecimales) \n<br> ";
$numeroDecimal2 = floor($numeroDecimal2);
echo "el numero con floor es $numeroDecimal2\n";



?>
<?php 
function formula ($h, $b){
$resultado = ($h*$b)/2;
echo("El area del triangulo con base = $b, y altura = $h, es de un total de $resultado m2");
}
$base = $_REQUEST["base"];
$alto = $_REQUEST["alto"];

formula($alto, $base);







?>
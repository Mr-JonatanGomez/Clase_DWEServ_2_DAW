<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
/* Arrays asociativos, en lugar de el index ser 0,1,2,3...se lo danmos nosotro


*/
$color = array("rojo"=>100, "verde"=>200);


/* foreach clave valor */
$colores= array("rojo", "azul","verde","amarillo","negro","rosa", "blanco");

foreach ($colores as $key => $item) {
    echo "clave/index: $key.    valor $item <br>";
}
 /* foreach valor */
echo "<br><br>";
foreach ($colores as $item) {
    
    echo "$item, ";
}



/* FUNCIONES CON ARRAY */
$frutas = ["manzana", "pera", "manzana", "naranja", "pera", "pera","platano","kiwi", "sandia"];
echo "<br><br><b>array a usar (foreach valor)</b><br> ";
foreach ($frutas as $value) {
    echo $value.", ";
    
}

echo "<br><br><b>array a usar (foreach key valor)</b><br> ";
foreach ($frutas as $key => $value) {
    if ($key == count($frutas)-1) {
        echo $value.".";
    }else{
        echo $value.", ";
    }
}

//array_search (needle, haystack, strict)
    /* 
    $needle: El valor que estás buscando.
    $haystack: El array en el que deseas buscar.
    $strict (opcional): Si se establece en true, 
                        debe coincidir tanto el valor 
                        como el tipo de dato.
 */
echo "<br><br><b>array_search </b>devuelve el indice de platano<br>";

$busqueda = array_search("platano", $frutas);
echo $busqueda;// devuelve la posicion donde se encuentra platano, si no existe, no devuelve nada

//array_count_values
echo "<br><br><b>array_count_values</b><br>";

$conteo = array_count_values($frutas);//igualamos una var a este metodo
print_r($conteo); // nos devolvera las cantidades de cada una, con print_r


// count

echo "<br><br><b>array_count</b> devuelve el numero de elementos del array<br>";

echo count($frutas);// devuelve el numero de frutas

//sort()

echo "<br><br><b>sort()</b> ordena un array (imporeso con implode) que separa mediante delimitador <br>";
sort($frutas);// ordena alfabeticamente, los numeros los ordena de menor a mayor
echo implode(", ", $frutas);

//rsort() -> ascendente alfabeticamente las key //krsort() ->descendente

echo "<br><br><b>rsort()</b> ordena <b>alfabeticamente</b> los arrays asociativos por su key <br>";
$edades = ["Jonatan" => 37, "Sandra" => 34, "Liam" => 4];
print_r($edades); 
ksort($edades);
echo"<br>";
print_r($edades); 

echo "<br><br><b>rsort()</b> ordena <b>alfabeticamente Z-A</b> los arrays asociativos por su key <br>";
krsort($edades);
print_r($edades); 


?>

</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
// necesita los cierres de linea
// al ejecutar un php, solo muestra el html
print "<u>Se puede imprimir pantalla con <b>print</u></b>\n";
echo "<br><u>o con <b>echo</u></b>\n";


$variableNum=7;
$variableBool=false;
$variableDouble=1.57;
$variableString="Hola esto es una cadena";
$paraDump=[1,2,3,5,6,"lilio"];

print "<br>Las variables van como en JS, sin tipar, podemos usar gettype para ver su tipo\n";

print "<br> usando el gettype con una variable, su tipo es: ".gettype($variableNum);
echo "<br> usando el gettype con otra variable, su tipo es: ".gettype($variableBool);

echo "<br>podemos usar ( is_bool(), is_integer(), is_scalar(), is_array(), is_null(), is_string(), is_float(), is_numeric() ) <br>para ver si son de determinado tipo\n";

echo "<br> usando el is_numeric con una variable integer, es numerico?: ".(is_numeric($variableNum)?'true':'false');
echo "<br> usando el is_numeric con otra variable string, es numerico?: ".(is_numeric($variableString)?'true':'false');
print "<br>";
echo "<br> usando el var_dump() con otra variable array, mostrara tipo y valor: ";
echo var_dump($paraDump);

?>
</body>
</html>
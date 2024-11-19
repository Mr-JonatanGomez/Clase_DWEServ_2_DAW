<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php 
     // INCLUSION FICHEROS EXTERNOS include(), require()
            // include() con los errores produce un warning
            // require() un error fatal, (Se debera usar este si al dar 
            //           error debe interrumpirse la carga de pagina)

            //require("fechas.php"); por ejemplo
    
    ?>
</head>
<body>
    <?php

   //funciones
function suma ($x, $y){
    $resultado = $x+$y;
    return $resultado;
}
$a=25;
$b=3;
$c=suma($a,$b);

echo $c."<br>";

//Paso de arg por referencia, la variable puede ser modificada dentro de la funcion

function incrementa (&$a){
/* en lugar de pasar una copia del valor de la variable a la función, 
pasamos una referencia a la variable original. Esto permite que cualquier 
cambio hecho a la variable dentro de la función se refleje en la variable 
original fuera de la función.
 */$a += 7;
//si ejecutamos esta funcion $a, que valia 25, valdra 26
}
incrementa($a);
echo $a." la funcion por ref, incremento su valor<br>";
/* args por defecto = que javaScript, si no le pasas te da el de defecto */


//FUNCIONES CON ARGS POR DEFECTO
$nombre="Gomez";
function muestraNombre ($nom, $titulo = "Sr."){
    echo "estimado $titulo $nom<br>";
}
muestraNombre($nombre);
muestraNombre($nombre ,"Profesor")


?>
</body>
</html>
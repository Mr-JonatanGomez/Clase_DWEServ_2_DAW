<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        // Muestra la tabla de multiplicar de un número generado de manera aleatoria entre 1 y 10. El resultado en formato <table>
        $numeroRand = rand(1,10);
        echo "El numero aleatorio esta vez fue: ". $numeroRand ."<br>";
        for ($i=0; $i <=10 ; $i++) { 
            print $numeroRand ." x ". $i ." = ". $numeroRand*$i ."<br>";
        }
//todo hacer la tabla, esperando respuesta del profesor
    ?>

</body>
</html>
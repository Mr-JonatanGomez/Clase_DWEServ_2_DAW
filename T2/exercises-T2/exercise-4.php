<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        /*Realiza un programa que nos diga cuántos dígitos tiene un número 
        aleatorio entre (0 y 9999). Mostrar el número y la cantidad de dígitos.*/

        $numRand = rand(0,9999);
        print "El numero aleatorio ha entre 0 y 9999 ha sido: " . $numRand ."<br>";
        //v1
        $numDigit = strlen($numRand);
        print "El numero $numRand tiene una cantidad de $numDigit digitos, contados con strlen <br>";

        //v2
        if ($numRand <=10) { // no necesitamos corte al negativo, porque el rango es 0-9999
            print "El numero $numRand tiene una cantidad de 1 digito, sacado con IF & ELSEIF";
        }elseif ($numRand <=100) {
            print "El numero $numRand tiene una cantidad de 2 digitos, sacado con IF & ELSEIF";
        }elseif ($numRand <=1000) {
            print "El numero $numRand tiene una cantidad de 3 digitos, sacado con IF & ELSEIF";
        }elseif ($numRand <=10000) {
            print "El numero $numRand tiene una cantidad de 4 digitos, sacado con IF & ELSEIF";
        }

    ?>
</body>
</html>
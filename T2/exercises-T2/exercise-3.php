<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 50%;
            border: solid 2px;
        }
        tr{
        text-align: center;
        }
        td{
            border: solid 1px;
        }

        
    </style>
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
        print "<br>";
        //echo "<tr>"

        print "<table>";
        echo "<tr>";
        echo "<th>multiplicando</th><th>multiplicador</th><th>producto</th>";
        echo "</tr>";

        echo "<tr>";
        for ($i=0; $i <=10 ; $i++) { 
            $result = $i*$numeroRand;
            print "<tr><td> $numeroRand </td> <td>$i</td> <td>$result</td></tr><br>";
        }
        
        echo "</tr>";

        print "</table>";

    ?>

</body>
</html>
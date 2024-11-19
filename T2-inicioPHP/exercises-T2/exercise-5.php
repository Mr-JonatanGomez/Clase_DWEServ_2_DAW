<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width: 35%;
            border: solid 2px;
            border-radius: 6px;
            text-align: center;
            margin: 0 auto;
            background-color: red;
            padding: 10px;
           
        }

        th, td {
           
            border: solid 2px;
            background-color: white;
            padding: 10px;
        }
        

    </style>
</head>
<body>
    <h1>Mostrando 10 números aleatorios y su cuadrado</h1>
    

    <table>
    <!-- tabla creada ayudandome de google 
    la tabla consta de cabecera thead 
    la tabla consta de cuertpo tbody 
        tr es una fila
        th encabezado
        td es una celda
 
 -->
        <thead>
            <tr>
                <th>base</th>
                <th>Cuadrado</th>
                <th>Cubo</th>
            </tr>
        </thead>
        <tbody>

        <?php

        for ($i=0; $i <10 ; $i++) { 
            $numRand = rand(5,20);
            print "<tr>";
            print "<td>$numRand</td>";
            print "<td>".pow($numRand,2) ."</td>";
            print "<td>".pow($numRand,3) ."</td>";
            print "</tr>";


        }
        
    ?>
        </tbody>
        

    </table>
</body>
</html>
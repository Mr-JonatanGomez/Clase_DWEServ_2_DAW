<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El rectangulo aleatorio</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
    <div class="container">
        <h1>El rectangulo aleatorio</h1>
        
            <?php
                $numero1row = rand(5,15);
                $numero2col = rand(5,15);
                $arrayMulti = [];

                echo "<p id='parrafo'>El numero aleatorio para la <b>altura</b> = <b>$numero1row</b> <br> El numero aleatorio para el <b>ancho</b> = <b>$numero2col</b> <br><br>\n</p>";
            ?>
        <div class="container-rectangule">
            <?php
                for ($i=0; $i < $numero1row; $i++) { 
                    for ($j=0; $j < $numero2col; $j++) { 
                        echo "* ";
                    }
                    echo "<br>";
                }
            ?>

        </div>
    </div>
    
</body>
</html>

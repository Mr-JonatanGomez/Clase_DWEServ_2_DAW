<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="" method="post">
        <h1>Operaciones multiples</h1>
        <input type="number" name="num1" placeholder="Introduce aquí primer numero"><br>
        <input type="number" name="num2" placeholder="Introduce aquí segundo numero"><br>
        <input type="submit" name="calcular" value="calcular">
    </form>

<form class="result">

    <?php
    function opers($a,$b,){
        $reSum= $a+$b;
        $reRes= $a-$b;
        $reMul= $a*$b;
        $reDiv= $a/$b;

        echo("la suma de $a y $b da como resultado $reSum<br>");
        echo("la resta de $a y $b da como resultado $reRes<br>");
        echo("la multiplicacion de $a y $b da como resultado $reMul<br>");
        if ($b==0) {
            echo("el divisor nunca puede ser 0, NO SE PUEDE DIVIDIR</b><br>");
        }else{
            echo("la division de $a y $b da como resultado $reDiv<br>");
        }
    }

    if (isset($_REQUEST["calcular"])) {
        $num1=$_REQUEST["num1"];
        $num2=$_REQUEST["num2"];

        opers($num1,$num2);
    }



    
    ?>
</form>
</body>
</html>
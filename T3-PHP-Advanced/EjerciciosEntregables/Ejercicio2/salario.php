<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <form action="" method="post">
        <h1>Salario</h1>
        Horas trabajadas L-V (12€) <br>
        <input type="number" name="lunes" placeholder="Introduce aquí primer numero"><br>
        
        Horas trabajadas S (15€) <br>
        <input type="number" name="sabados" placeholder="Introduce aquí Horas extras"><br>

        Horas trabajadas Festivos (24€) <br>
        <input type="number" name="festivos" placeholder="Introduce aquí horas Festivas"><br>

        <input type="submit" name="calcular" value="calcular">
    </form>

<form class="result">

    <?php
    function calculoSalarial($a,$b,){
       //todo REALIZAR LOGICA
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
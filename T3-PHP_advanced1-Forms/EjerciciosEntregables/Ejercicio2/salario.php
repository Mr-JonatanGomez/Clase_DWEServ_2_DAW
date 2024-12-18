<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<form>

    <?php
    
    function calculoSalarial($horasN,$horasE,$horasF){
        $precioHora=12;
        $precioExtra=15;
        $precioFestivo=24;
        $base=$precioHora*$horasN;
        $extra=$precioExtra*$horasE;
        $fest=$precioFestivo*$horasF;
        
        if ( !is_numeric($horasN)||!is_numeric($horasE)||!is_numeric($horasF)) {
            echo("Lo siento, debes rellenar con numeros");
        }
        
        $salarioMensual=$base+$extra+$fest;
        echo("Tu sueldo base este mes es:<br>");
        echo("Por horas base= $base<br>");
        echo("Por horas extra= $extra<br>");
        echo("Por horas festivas= $fest<br><br>");
        echo("<b>Tu sueldo total= $salarioMensual</b><br>");
    }
    
    if (isset($_REQUEST["calcular"])) {
        $totalHoras=$_REQUEST["horas"];
        $totalExtras=$_REQUEST["extras"];
        $totalFestivos=$_REQUEST["festivos"];

        calculoSalarial($totalHoras,$totalExtras,$totalFestivos);
    }else{

        ?>
        <h1>Salario</h1>
        Horas trabajadas L-V (12€) <br>
        <input type="number" name="horas" placeholder="Introduce aquí primer numero" required><br>
        
        Horas trabajadas S (15€) <br>
        <input type="number" name="extras" placeholder="Introduce aquí Horas extras" required><br>

        Horas trabajadas Festivos (24€) <br>
        <input type="number" name="festivos" placeholder="Introduce aquí horas Festivas" required><br>

        <input type="submit" name="calcular" value="calcular">

        <?php
    }



    
        ?>
</form>

   


</body>
</html>
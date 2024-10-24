<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $contador1=0;
        $contador2=0;
        $contador3=0;
        $contador4=0;
        $contador5=0;
        $contador6=0;

        for ($i=0; $i <100 ; $i++) { 
            $dado= rand(1,6);
    
                if($dado==1){
                    $contador1++;
                }elseif($dado==2){
                    $contador2++;
                }elseif($dado==3){
                    $contador3++;
                }elseif($dado==4){
                    $contador4++;
                }elseif($dado==5){
                    $contador5++;
                }else{
                    $contador6++;
                }
    
        }

        //todo intentar colocarlo en una linea y añadir el porcentaje de cada opcion, si fuera equitativo 16.6
print "<img src='./img/1.png' width=60 height=60/> <h3> salió un total de $contador1 veces </h3>";
print "<img src='./img/2.png' width=60 height=60/> <h3> salió un total de $contador2 veces </h3>";
print "<img src='./img/3.png' width=60 height=60/> <h3> salió un total de $contador3 veces </h3>";
print "<img src='./img/4.png' width=60 height=60/> <h3> salió un total de $contador4 veces </h3>";
print "<img src='./img/5.png' width=60 height=60/> <h3> salió un total de $contador5 veces </h3>";
print "<img src='./img/6.png' width=60 height=60/> <h3> salió un total de $contador6 veces </h3>";





?>
</body>
</html>
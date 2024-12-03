<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">

<?php
        
    function mostrarMayor($arrayNum){
    $resultado= max($arrayNum);
    echo"El numero mayor de los aportados es $resultado";
    }

    if (isset($_REQUEST["enviar"])) {
        $numA= $_REQUEST["num1"];
        $numB= $_REQUEST["num2"];
        $numC= $_REQUEST["num3"];

        $array=[$numA,$numB,$numC];

        mostrarMayor($array);
?>      
        <br>
        <a href="./devolverMayor.php">Volver al formulario</a>
<?php
    } else{
?>
    
        <h1>El Mayor de 3</h1>
        <label for="num1">Introduce primer numero</label>
        <input type="number" id="num1" name="num1"><br>
        <label for="num2">Introduce segundo numero</label>
        <input type="number" id="num2" name="num2"><br>
        <label for="num3">Introduce tercer numero</label>
        <input type="number" id="num3" name="num3"><br>
    
        <input type="submit" name="enviar" value="enviar">
        <input type="reset" name="reset" value="borrar">
<?php
    }

?>



    </form>
</body>
</html>
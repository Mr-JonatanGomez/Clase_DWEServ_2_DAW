<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<form>

    <?php
    
    function coversion($opcion,$cant){
        $kb_mb= false;
        $mb_kb= false;
        $resultado=0;
        
        switch ($opcion) {
            case 'kb-mb':
                $resultado= $cant/1000;
                $kb_mb=true;
                break;

            case 'mb-kb':
                $resultado= $cant*1000;
                $mb_kb= true;
                break;
            
            default:
                echo("Debes elegir una opcion");
                break;
        }

        if ($kb_mb) {
            echo("Tu conversion de $cant Kilobytes a Megabytes da un resultado de: $resultado");
        }else if ($mb_kb){
            echo("Tu conversion de $cant Megabytes a Kiloabytes da un resultado de: $resultado");

        }else{
            echo("Resultado no previsto");

        }
    }
        
  
    if (isset($_REQUEST["convertir"])) {
        $cantidad=$_REQUEST["cantidad"];
        $opcion = $_REQUEST["opcion"];
        

        coversion($opcion,$cantidad);
    }else{

        ?>
        <h1>Conversor</h1>
        <b>Seleccionar tipo de cambio</b> <br><br><hr><br>
        kilobyte to megabyte<input class="opcion" type="radio" name ="opcion" value="kb-mb" required><br>
        megabyte to kilobyte<input class="opcion" type="radio" name ="opcion" value="mb-kb"><br><br>
        introduce la cantidad que deseas convertir<br>
        <input type="number" name="cantidad" required><br>

        <br>
    

        <input type="submit" name="convertir" value="convertir">

        

        <?php
    }



    
        ?>
</form>

   


</body>
</html>
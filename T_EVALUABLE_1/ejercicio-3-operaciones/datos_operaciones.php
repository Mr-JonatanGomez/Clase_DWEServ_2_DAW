<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>web-form</title>
        <link rel="stylesheet" href="./style.css" />
    </head>
    <body>
        <?php
            $resultado;

            
                $num1 = $_REQUEST["numA"];
                $num2 = $_REQUEST["numB"];
                $operacion = $_REQUEST["operation"];

            if (is_numeric($num1) && is_numeric($num2)) {
                # hacer switch
            }else if ($operacion !=="") {
                echo("Debes elegir un tipo de operacion");
            }else{
                echo("Lo siento, ambos deben ser numeros, 
                <br> 
                pero como son tipo number, no podras meter otra cosa
                <br>
                y este mensaje es solo de decoro");
            }

                switch ($operacion) {
                    case 'suma':
                        $resultado = $num1+$num2;
                        break;
                    case 'resta':
                        $resultado = $num1-$num2;
                        break;
                    case 'multiplicacion':
                        $resultado = $num1*$num2;
                        break;
                    case 'division':
                        if ($num2==0) {
                            $resultado = "No se puede dividir entre 0";
                            break;
                        }
                        else{

                            $resultado = $num1/$num2;
                            break;
                        }
                    
                }

                print("<br>TUS DATOS<br>\n");
            
                echo("Primer numero: $num1<br>
                Segundo numero: $num2<br>
                Operacion elegida: $operacion<br>
                Resultado: $resultado");
            

        ?>
    </body>
</html>

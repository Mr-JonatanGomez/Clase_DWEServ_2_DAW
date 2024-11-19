<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>web-form</title>
        <link rel="stylesheet" href="./style.css" />
    </head>
    <body>
        <div class="container">
            <h1 id="ej1">Operaciones matemáticas</h1>
            

            <div class="form">
                
                <form action="datos_operaciones.php" method="post">
                    <table>
                        <tr>
                            <td><label>Introduce primer operando:</label></td>
                            <td><input name="numA" class="num" type="number" placeholder="ej: 15"></td>
                            <td class="selectOper" colspan="4"><label>Seleccione la operación</label></td>
                        </tr>
                        <tr>
                        <td><label>Introduce segundo operando:</label></td>
                        <td><input name="numB" class="num" type="number" placeholder="ej: 5"></td>
                        
                        <td><input type="radio" name="operation" value="suma">Suma</td>
                        <td><input type="radio" name="operation" value="resta">Resta</td>
                        <td><input type="radio" name="operation" value="multiplicacion">Multipliación</td>
                        <td><input type="radio" name="operation" value="division">División</td>
                        </tr>
                    </table>
                        <input id="envio" type="submit" value="Enviar">
                </form>

            </div>
        </div>
    </body>
</html>

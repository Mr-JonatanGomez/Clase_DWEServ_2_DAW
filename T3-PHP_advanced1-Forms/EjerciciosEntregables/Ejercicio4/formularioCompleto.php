<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
<form action="" method="post">

    <?php
    
    function mostrarDatos($nom,$ape,$age,$pes,$sex,$civ,$afi ){


        echo "Su nombre es: <b>$nom</b><br><br>";
        echo "Sus apellidos son: <b>$ape</b><br><br>";
        echo "Su edad es: <b>$age</b> años<br><br>";
        echo "Su peso es: <b>$pes</b> kg<br><br>";
        echo "Su sexo es: <b>$sex</b><br><br>";
        echo "Su estado civil es: <b>$civ</b><br><br>";
        /* hacemos contador, para el numero de aficiones */
       /*  $contador = count($afi);
        for ($i=0; $i < $contador ; $i++) { 
            # code...
        } */
        echo "Sus aficiones son: <b>" . implode(", ", $afi) . "</b><br><br>";
       

    }
        
  
    if (isset($_REQUEST["enviar"])) {
        $nombre=$_REQUEST["nombre"];
        $apellidos = $_REQUEST["apellidos"];
        $edad = $_REQUEST["edad"];
        $peso = $_REQUEST["peso"];
        $sexo = $_REQUEST["sexo"];
        $civil = $_REQUEST["estado"];
        $aficiones = $_REQUEST["opcion"];
        

        mostrarDatos($nombre,$apellidos,$edad,$peso,$sexo,$civil,$aficiones);
        ?>
        <a href="./formularioCompleto.php">Volver al formulario</a>;
        <?php
    }else{

        ?>
    

        <h1>Formulario completo</h1>
    

        <table>

            <tr>
                <td>
                <b>Nombre:</b> <br>
                    <input type="text" name="nombre">
                </td>
                <td>
                <b>Apellidos:</b><br>
                    <input type="text" name="apellidos">
                </td>
                <td class="edad">
                <b>Edad:</b><br>
                    <select type ="text" name="edad" required>
                    <option value="Entre 15 y 21 años">Entre 15 y 21 años</option>
                    <option value="Entre 22 y 35 años">Entre 22 y 35 años</option>
                    <option value="Entre 36 y 50 años">Entre 36 y 50 años</option>
                    <option value="Entre 51 y 65 años">Entre 51 y 65 años</option>
                    <option value="Mayor de 65 años">Mayor de 65 años</option>
                </td>
            </tr>
            <tr>

                <td>
                <b>Peso:</b><br>
                <input type="number" min="45" name="peso">
                </td>
                <td>
                <b>Sexo:</b><br>
                <input type="radio" name="sexo" value="Hombre">Hombre
                <input type="radio" name="sexo" value="Mujer">Mujer
                </td>
                <td>
                <b>Estado Civil::</b><br>
                <input type="radio" name="estado" value="Soltero">Soltero
                <input type="radio" name="estado" value="Casado">Casado
                <input type="radio" name="estado" value="Otro">Otro
                </td>
            </tr>

            
            <tr>
                <td class="aficiones">
                    <b>Aficiones:</b>
                </td>
                
                <td class="opciones" colspan="2">
                    <label>Deportes</label><input class="opcion" type="checkbox" name ="opcion[]" value="deportes">
                    <label>Television</label><input class="opcion" type="checkbox" name ="opcion[]" value="television">
                    <label>Comics</label><input class="opcion" type="checkbox" name ="opcion[]" value="comics"><br>
                    <label>Música   </label><input class="opcion" type="checkbox" name ="opcion[]" value="musica">
                    <label>Literatura   </label><input class="opcion" type="checkbox" name ="opcion[]" value="literatura">
                    <label>Cine</label><input class="opcion" type="checkbox" name ="opcion[]" value="cine">

                </td>
            </tr>

            <tr>
                <td>

                    <input type="submit" name="enviar" value="Enviar">
                    <input type="reset" name="reset" value="Reset">
                </td>
            </tr>
        </table>

        <?php
    }

        ?>
</form>

   


</body>
</html>
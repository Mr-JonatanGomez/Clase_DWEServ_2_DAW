<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <?php
    if (isset($_REQUEST["enviar"])) {
        # comprueba si se ha pulsado enviar y se mete aqui el codigo de rocesamiento
        $nombre = $_REQUEST["nombre"];
        $opcionesCasa= $_REQUEST["extras"];
        
        echo "<h2>Formulario procesado</h2>";
        echo "Hola, <strong>$nombre</strong>. Aquí están tus selecciones:<br>";
        
        
        echo("<br> Tus extras de la casa son:<br>");
        foreach ($opcionesCasa as $item) {
            echo "- $item<br>";
        }
    }else{
        #apertura del else, luego cierre de php, y se abre y cierra un php al final del DOM para cerrar llave de else
?>

        <form action="3-Form-Procesado-1file.php" method="post">
        Nombre :  <input type="text" name="nombre" required><br>


        Opciones de la Casa: <br>
        <input type="checkbox" name="extras[]" value="garaje"> garaje <br>
        <input type="checkbox" name="extras[]" value="piscina"> piscina<br>
        <input type="checkbox" name="extras[]" value="jardin"> jardin<br>
        <input type="checkbox" name="extras[]" value="alarma"> alarma<br>
        <p>En los input de tipo checkbox, el name debe recoger array, ya que al 
            poder seleccionar varias opciones, deberan guardarse en un array e 
            imprimirse con un foreach o for </p><br><br>
            
            <input type="submit" name="enviar" value="enviar"><br><br>


        </form>
<?php
    }
    #llave de cierre del else
?>
</body>
</html>
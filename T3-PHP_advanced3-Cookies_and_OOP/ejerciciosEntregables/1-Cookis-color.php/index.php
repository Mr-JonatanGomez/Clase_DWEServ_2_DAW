<?php
    $rojo=255;
    $verde=255;
    $azul=255;

    


   
    
    if(isset($_COOKIE["color1"]) && isset($_COOKIE["color2"]) && isset($_COOKIE["color3"]) ) {
        
            #establecemos el color a la cookie
            $rojo=$_COOKIE["color1"];
            $verde=$_COOKIE["color2"];
            $azul=$_COOKIE["color3"];
            #echo"LA COOKIE ESTA ESTABLECIDA EN RGB $rojo, $verde, $azul";
    }


    if (isset($_REQUEST["envio"])) {

        
        $rojo=$_REQUEST["red"] ?: 0; #?: coge el valor indicado, si esta vacio o null, coge lo siguiente
        $verde=$_REQUEST["green"] ?: 0;
        $azul=$_REQUEST["blue"] ?: 0;
        
      
        

        setcookie("color1", $rojo, time()+300);
        setcookie("color2", $verde, time()+300);
        setcookie("color3", $azul, time()+300);


        /* TIENE EL PROBLEMA QUE LA COOKIE SOLO ESTA DISPONIBLE EN LA SIGUIENTE SOLICITUD HTTP
         */
        echo"SE HA GUARDADO LA COOKIE RGB {$_COOKIE["color1"]}, {$_COOKIE["color2"]}, {$_COOKIE["color3"]}";
    }

    if (isset($_REQUEST["borrar"])) {


        if (isset($_COOKIE["color1"]) && isset($_COOKIE["color2"]) && isset($_COOKIE["color3"]) ) {
            
            setcookie("color1", "", time()-1);
            setcookie("color2", "", time()-1);
            setcookie("color3", "", time()-1);
    
    
    
            $rojo = $verde = $azul = 255;



            echo"SE HA BORRADO LA COOKIE y SU VALOR DEFECTO ES RGB $rojo, $verde, $azul <br>";
            
        }
    }
    
    $backgroundColor="rgb($rojo,$verde,$azul)";
    $rojo2= 255 - $rojo;
    $verde2= 255 - $verde;
    $azul2= 255 - $azul;
    $colorLetra="rgb($rojo2, $verde2, $azul2)";




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio Color por Cookie</title>
    <link rel="stylesheet" href="./style.css">

</head>
<body style="background-color: <?php echo $backgroundColor;?>;color: <?php echo $colorLetra;?>">
    <header>
        <h2>CAMBIO DE COLOR CON LA COOKIE ALMACENADA</h2>
            
    </header>
    <div class="container">
        <form action="" method="post" style="background-color: white; color:black">

            <h3>Elige los 3 colores RGB</h3>
            
            <div class="opcion">
                <label for="red">Rojo</label>
                <input type="number" name="red" max="255" min="0" id="red" style="width: max-content;"><br>
            
                <label for="green">Verde</label>
                <input type="number" name="green" max="255" min="0" id="green" style="width: max-content;"><br>
            
                <label for="blue">Azul</label>
                <input type="number" name="blue" max="255" min="0" id="blue" style="width: max-content;"><br>
                
                <!-- <label for="color">Color</label>
                <input type="color" name="color" value="Seleccion de Color"><br> -->
            </div>

            

            <div class="botones">
                <input type="submit" name="envio" id="envio" value="introducir cambio">
                <input type="submit" name="borrar" id="borrar" value="Borrar Cookie">
            </div>

        </form>
        
    </div>
</body>
</html>
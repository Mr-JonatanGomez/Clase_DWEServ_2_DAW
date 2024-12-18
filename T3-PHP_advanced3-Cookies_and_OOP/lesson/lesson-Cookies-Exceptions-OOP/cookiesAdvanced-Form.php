<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

    if (isset($_REQUEST["aceptar"])) {
        $pelicula= $_REQUEST["pelicula"];
        $deporte= $_REQUEST["deporte"];
        setcookie("pelicula", $pelicula, time()+75);
        setcookie("deporte", $deporte, time()+75);
    }
    if(isset($_REQUEST["borrar"])){
        setcookie("pelicula", "", -1);
        setcookie("deporte", "", -1);
        unset($pelicula);
        unset($deporte);
    }
    if (isset($_COOKIE["pelicula"])&& isset($_COOKIE["deporte"])) {
        echo "Tu pelicula favorita es: $pelicula <br>";
        echo "Tu deporte favorito es: $deporte <br><br>";

    }elseif (isset($_COOKIE["pelicula"])) {
        echo"Ya tienes la cookie de Pelicula<br>";
        echo"Pero te falta la cookie de deporte<br><hr>";
?>
    <form action="" method="POST">
        <h2>Introduce tus nombres para la cookie que te falta</h2>
                
        <label for="deporte">Introduce tu deporte favorito</label>
        <input type="text" name="deporte" id="deporte"><br><br>
                
        <input type="submit" name="aceptar" id="aceptar" value="ACEPTO">
    </form>
    
    <form action="" method="POST">

        <input type="submit" id="borrar" value="BORRAR COOKIES">
        <input type="hidden" name="borrar" value="si">
    </form>

<?php        # code...
    }elseif (isset($_COOKIE["deporte"])) {
        echo"Ya tienes la cookie de Deporte<br>";
        echo"Pero te falta la cookie de pelicula<br><hr>";
?>
    <form action="" method="POST">
        <h2>Introduce tus nombres para la cookie que te falta</h2>
        <label for="pelicula">Introduce tu pelicula favorita</label>
        <input type="text" name="pelicula" id="pelicula"><br><br>
        <label for="deporte">Ya tienes cookie de Deporte</label>
        

        <input type="submit" name="aceptar" id="aceptar" value="ACEPTO">
    </form>
    
    <form action="" method="POST">
        <input type="submit" id="borrar" value="BORRAR COOKIES">
        <input type="hidden" name="borrar" value="si">
    </form>
        
<?php     
            }
    
    
    else{
?>
    <form action="" method="POST">
        <h2>Introduce tus nombres para las cookies</h2>
        <label for="pelicula">Introduce tu pelicula favorita</label>
        <input type="text" name="pelicula" id="pelicula"><br><br>
        <label for="deporte">Introduce tu deporte favorito</label>
        <input type="text" name="deporte" id="deporte"><br><br>

        <input type="submit" name="aceptar" id="aceptar" value="ACEPTO">
        
    </form>

    <form action="" method="POST">

        <input type="submit" id="borrar" value="BORRAR COOKIES">
        <input type="hidden" name="borrar" value="si">
    </form>



<?php
    }
?>







</body>
</html>

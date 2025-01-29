<?php
session_start()
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Pedido</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style.css">
</head>
<body>

<?php


if (isset($_REQUEST["enviar"])) {
    $archivo="pedido.txt";
    
    $nombre=$_SESSION["nombre"]; /*  AQUI COGEMOS EL NOMBRE CON EL QUE TENEMOS INICIADA LA SESION */
    $direccion=$_REQUEST["direccion"];
    $producto=$_REQUEST["producto"];
    $cantidad= $_REQUEST["cantidad"];

    $abrirArchivo = fopen($archivo, "a"); #con "A" añadimos, con write sobreescribimos
    # para LEER : $linea = fgets($archivo);
    /* PARA LECTURA
     while($linea!= false){
        $lista = $linea.explode(" ")
    } 
        */

        if ($cantidad<1) {
            echo "AL NO SELECCIONAR CANTIDAD; SE ASIGNA UNO POR DEFECTO";
            $cantidad =1;
        }

    $linea=implode(",",[$nombre, $direccion, $producto, $cantidad, PHP_EOL]);



    fwrite($abrirArchivo, $linea);
    fclose($abrirArchivo);

    echo"Pedido Registrado CORRECTAMENTE";

    header("Location: menuInicial.php");
    exit();


        

}else{


?>


<form action="#" method="post">
           <!--  <label for="nombre">
                <div class="tipo">
                    <strong>Nombre</strong>
                </div>
                <input type="text" name="nombre">
            </label><br> -->
    
            <label for="password">
                <div class="tipo">
                    <strong>Direccion</strong>
                </div>
                <input type="text" name="direccion">
            </label><br>

            <label for="producto">
              iPhone11  <input type="radio" name="producto" value="iPhone11">
            </label><br>
            <label for="producto">
              Roomba  <input type="radio" name="producto" value="Roomba">
            </label><br>
            <label for="producto">
              Reloj  <input type="radio" name="producto" value="Reloj">
            </label><br>

            <label for="cantidad">
                Cantidad <input type="number" name="cantidad" id="cantidad">
            </label>
    
            <label for="enviar">
                <input class="submit" type="submit" name="enviar" value="ENVIAR" id="enviar">
            </label>
        </form>
<?php
    }
?>




</body>
</html>
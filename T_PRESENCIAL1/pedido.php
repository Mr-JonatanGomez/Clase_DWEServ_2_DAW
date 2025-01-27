<?php
session_start()
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    $linea=implode(",",[$nombre, $direccion, $producto, $cantidad, "\n"]);



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
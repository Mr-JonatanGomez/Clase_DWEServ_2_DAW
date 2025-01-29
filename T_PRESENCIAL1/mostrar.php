<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./style.css">
</head>
<body>
    

<?php
    $archivo="pedido.txt";
    if (isset($_REQUEST["volver"])) {
        header("Location: menuInicial.php");
        exit();
    }


    if (isset($_REQUEST["mostrar"])) {
        $abrirArchivo = fopen($archivo, "r");
        $precioIphone=1000;
        $precioRoomba=500;
        $precioReloj=100;
    
/*  */

print "<table>";
echo "<tr>";
echo "<th>NOMBRE</th><th>DIRECCION</th><th>PRODUCTO</th><th>CANTIDAD</th><th>PRECIOTOTAL</th>";
echo "</tr>";

echo "<tr>";
for ($i=0; $i <=count($array) ; $i++) { 
    /* SIN IMPLEMENTAR LOGICA  */
    print "<tr><td> $numeroRand </td> <td>$i</td> <td>$result</td></tr><br>";
    /* SIN IMPLEMENTAR LOGICA  */
}

echo "</tr>";

print "</table>";


/*  */
        while(fgets($abrirArchivo) != false){
            $contadorFila=0;

            $linea = fgets($abrirArchivo)."<br>";
         
            $array = explode(",", $linea);

            $nombre=$linea[0];
            $direccion=$linea[1];
            $producto=$linea[2];
            $cantidad=$linea[3];
            $precio;# implementar bien el precio segun producto



        }
    }

?>

<!-- EL PEDIDO se coge de pedido.txt -->
 <form action="#" method="post">
 <input class="submit" type="submit" name="mostrar" value="mostrar" id="mostrar">
 <input class="submit" type="submit" name="volver" value="volver" id="volver">
 </form>


</body>
</html>
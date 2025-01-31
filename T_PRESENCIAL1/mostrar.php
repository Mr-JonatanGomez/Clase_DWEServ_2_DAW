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
        $indice=0;
    


        print "<table>";
        echo "<tr>";
        echo "<th>ID PEDIDO</th><th>NOMBRE</th><th>DIRECCION</th><th>PRODUCTO</th><th>CANTIDAD</th><th>PRECIOTOTAL</th>";
        echo "</tr>";

        while(($linea=fgets($abrirArchivo)) != false){
            $linea=strip_tags(trim($linea));
            $indice++;
            #$linea = fgets($abrirArchivo)."<br>";
         
            $array = explode(",", $linea);

            $nombre=$array[0];
            $direccion=$array[1];
            $producto=$array[2];
            $cantidad=$array[3];
            $precio=0;
            switch ($producto) {
                case 'iPhone11':
                    $precio= $precioIphone * $cantidad;
                    break;
                case 'Roomba':
                    $precio= $precioRoomba * $cantidad;
                    break;
                case 'Reloj':
                    $precio= $precioReloj * $cantidad;
                    break;
                
                default:
                    $precio=0;
                    break;
            }
            

            
            
                /* SIN IMPLEMENTAR LOGICA  */
                echo "<tr><td> $indice </td> <td>$nombre</td> <td>$direccion</td><td>$producto</td><td>$cantidad</td><td>$precio</td></tr>";
                /* SIN IMPLEMENTAR LOGICA  */
           
            
           

        }
        print "</table>";
    }

?>

<!-- EL PEDIDO se coge de pedido.txt -->
 <form action="#" method="post">
 <input class="submit" type="submit" name="mostrar" value="mostrar" id="mostrar">
 <input class="submit" type="submit" name="volver" value="volver" id="volver">
 </form>


</body>
</html>
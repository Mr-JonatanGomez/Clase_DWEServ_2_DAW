<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

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
        while($archivo != false){
/* SEGUIR POR AQUI */
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
<?php
if (isset($_REQUEST["enviar"])) {
    
    $archivo="inventario.txt";
    $nombreBuscado= $_REQUEST["search_term"];
    $contador=0;
    
    
        
        $archivoAbrir=fopen($archivo, "r");


        while (($linea=fgets($archivoAbrir))!=false){
            $arrayProds = explode(":",$linea);
            if (trim($arrayProds[1])== $nombreBuscado){
                $id = $arrayProds[0];
                $producto = $arrayProds[1];
                $cantidad = $arrayProds[2];
                $precio = $arrayProds[3];
                $contador++;
                echo "id del producto es: ".$id." <br> Nombre del producto es: ".$producto." <br> Cantidad del producto es: ".$cantidad." <br> Precio del producto es: ".$precio;
            }
            
        }
        if ($contador == 0) {
            echo "El producrto no existe";
        }
    
fclose($archivoAbrir);

}else{
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Buscar Producto - Sistema de Gestión de Inventario</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h1>Buscar Producto</h1>
    
    <form method="post" action="">
        <input type="text" name="search_term" placeholder="Ingrese ID o nombre del producto" required>
        <input type="submit" name="enviar" value="Buscar">
    </form>

    
</body>
</html>


<?php
}
?>


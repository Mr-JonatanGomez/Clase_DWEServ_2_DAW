<?php
function agregarProducto(){
    $conexion = mysqli_connect("localhost", "root", "", "tiendaBasicPHP");
    if (!$conexion) {
        die("Conexion fallida". mysqli_connect_error($conexion));
    }
    
        $producto = isset($_REQUEST["producto"]);

        $nombreProducto= mysqli_real_escape_string($conexion, $producto);
        $query= "INSERT INTO productos (nombre) VALUES ('$nombreProducto') "; 

        
        $filasAfectadas= mysqli_affected_rows($conexion);
        
        if (mysqli_query($conexion, $query)) { #ejecuta la query
            
            echo "PRODUCTO AGREGADO";
        }else{
            echo "Error al guardar, no puedes guardar datos vacios" . mysqli_error($conexion);
        }

        mysqli_close($conexion);
}


/* if (isset($_REQUEST["enviar"])) {
    if (empty($_REQUEST["producto"])) {
        echo"ERROR, NO PUEDES GUARDAR DATOS VACIOS";
    }else{

        agregarProducto();
    }
} */

agregarProducto();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="1.add_objects-to_DBwithForm" method="POST">
        producto <input type="text" name="producto" required>
        <input type="submit" name="enviar" value="Guardar producto en DB">
        
    </form>
</body>
</html>
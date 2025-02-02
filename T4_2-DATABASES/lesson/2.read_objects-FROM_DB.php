    
<!-- INSERT NO DEVUELVE NUMERO DE FILAS, ES TRUE O FALSE -->
 <!-- SELECT SI DEVUELVE NUMERO DE FILAS -->

<?php
function mostrar(){

    $conexion= mysqli_connect("Localhost", "root", "", "tiendaBasicPHP");
    if (!$conexion) {
        die("Error de Conexion". mysqli_connect_error());
    }
    
    $query= "SELECT id, nombre FROM productos ";
    $resultadoQuery= mysqli_query($conexion, $query);
    
    /* USAREMOS EL 
            :num_rows, para ver el numero de filas existentes si 
            es mayor de 0 haremos un while para sacar datos
             */
    if (mysqli_num_rows($resultadoQuery)>0) {
        # fetch_assoc para meter cada fila de la respuesta query en un array
    
    #los array assoc, no van por numero, si no por nombre del campo-> array["id"]
    
        echo "<ul>";
        while ($row=mysqli_fetch_assoc($resultadoQuery)) {
            echo "<li> ID: ". $row["id"]." |  Nombre: ". $row["nombre"];
        }
        echo "</ul>";
    }else{
        echo "No hay productos para mostrar";
    }

    mysqli_close($conexion);
}

if (isset($_REQUEST["mostrar"])) {
    mostrar();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="#" method="post">
        <input type="submit" name="mostrar" value="MOSTRAR">
        
    </form>

</body>
</html>
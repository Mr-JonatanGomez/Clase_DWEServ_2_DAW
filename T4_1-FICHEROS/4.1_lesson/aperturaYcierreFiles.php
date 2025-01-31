<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>FICHEROS</h1>
    <p>Las operaciones básicas para operar ficheros son:<b>Leer, escribir y verificar si un archivo existe</b></p>
   
    <?php


    $archivo_datos="datos.txt";
    

        if (file_exists($archivo_datos)) {
            echo "EL ARCHIVO SI EXISTE";
            $archivo=fopen($archivo_datos,"r");/* ABRIMOS */
        }else{
            echo "EL ARCHIVO NO EXISTE....Creandolo ahora con fopen(), que sirve para abrir o para crear si no existe";
            //crear archivo
            $archivo = fopen($archivo_datos,"a+");
        }
        if ($archivo) {
            echo " ARCHIVO YA CREADO o YA EXISTENTE, cerramos el flujo";
            fclose($archivo);
            
        }else{
            echo"Error, no se pudo cerrar el archivo";
        }
    
    ?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escritura</title>
</head>
<body>
    <h1>FICHEROS ESCRITURA</h1>
    <p>Las operaciones básicas para operar ficheros son:<b>Leer, escribir y verificar si un archivo existe</b></p>
   
    <form action="#" method="post">
<label for="linea">Introduce nuevos datos</label>
<input type="text" name="linea">
<input type="submit" name="enviarDatos" value="enviarDatos">
<br>
<label for="leer">LEER DATOS</label>

<input type="submit" name="leer" value="leer">

    </form>



    <?php


if (isset($_REQUEST["enviarDatos"])) {
    $linea = ($_REQUEST["linea"]);
    if ($linea!="") {
        # code...
        anadir(trim($linea));
    }else{
        echo"La linea no se agregó por estar vacia";
    }
}

if (isset($_REQUEST["leer"])){
    leerTodo();
    leerTodoConFileGetContents();
}

    function anadir($lineaNueva){

        
    
        $archivo_datos="datos.txt";
        
    
            if (file_exists($archivo_datos)) {
                # echo "EL ARCHIVO SI EXISTE";
                $archivo=fopen($archivo_datos,"a+");
            }else{
                echo "EL ARCHIVO NO EXISTE....Creandolo ahora con fopen(), que sirve para abrir o para crear si no existe";
                //crear archivo
                $archivo = fopen($archivo_datos,"a+");
            }
            if ($archivo) {
                //ESCRIBIMOS EN EL ARCHIVO
                fputs($archivo,$lineaNueva. PHP_EOL);//EOL es el salto de linea
                
                
                fclose($archivo);
                
            }else{
                echo"Error, no se pudo cerrar el archivo";
            }
    }

    function leerTodo(){
        $archivo_datos="datos.txt";
        $archivo= fopen($archivo_datos,"r");

        while( ($linea=fgets($archivo)) != false) {
            # cuando linea es diferente DE FALSO
            echo $linea . "<br>";
        }

        if (PHP_EOL) {
            fclose($archivo);
        }
    }
    function leerTodoConFileGetContents(){
        $archivo_datos="datos.txt";
        $archivo= fopen($archivo_datos,"r");

         $todo=file_get_contents($archivo_datos);
            echo "leyendo todo desde file_get_contents";
            echo $todo . "<br>";
        

        
            fclose($archivo);
        
    }
    
    ?>




</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

</head>
<body>
<div class="container my-5">

    <form action="#" method="post">
        <h2>INTRODUCION DATOS</h2>
        <input type="text" name="nombre" placeholder="Nombre1" required>
        <input type="text" name="notas" placeholder="notas" required>
 
        <input type="submit" name="enviar" id="enviar" value="Guardar Datos">
    </form>

    <form action="#" method="post">
        <h2>BUSCAR</h2>
        <input type="text" name="nombreBuscado" placeholder="Nombre1" required>
        
        <input type="submit" name="buscar" id="buscar" value="Buscar">
    </form>

    <form action="#" method="post">
        <h2>MOSTRAR</h2>
        <input type="submit" name="mostrar" id="mostrar" value="MOSTRAR USERS">
    </form>

    <form action="#" method="post">
        <h2>RESETEAR FICHERO</h2>
        <input type="submit" name="borrar" id="mostrar" value="RESETEAR FICHERO">
    </form>
</div>
<div class="container mt-3">
<?php

$archivoNotas = "notas.txt";
abrirArchivo($archivoNotas); # al inicio para abrir o crear si no existe


if (isset($_REQUEST["enviar"])) {
    guardarUser($archivoNotas);
}

if (isset($_REQUEST["mostrar"])) {
    mostrarUsers($archivoNotas);
}
if (isset($_REQUEST["buscar"])) {
    buscar($archivoNotas);
}

if (isset($_REQUEST["borrar"])) {
    resetearFichero($archivoNotas);
}




function guardarUser($archivoNotas){
    $nombre= trim($_REQUEST["nombre"]);
    $notas= trim($_REQUEST["notas"]);
 

    #guardar datos en array, separados en coma y salto de linea final
    $datos= "$nombre: $notas\n";
    
    #damos  referencia al archivo al abrirlo
    $archivo=fopen($archivoNotas,"a+");
    fputs($archivo, $datos); # FPUTS necesita la ref del archivo abierto, y el array/string
    fclose($archivo);
}

function mostrarUsers($archivoNotas){

    if(file_exists($archivoNotas)){
        $archivo=fopen($archivoNotas,"r" );
        echo "<b>LOS USUARIOS GUARDADOS SON:</b><br>";

        while(($linea=fgets($archivo))!= false){
            #ahora usamos el xplode con separador de elementos
            $arrayUser = explode(":", $linea);
            $nom = $arrayUser[0];
            $not = $arrayUser[1];
            

           

            echo "Nombre: $nom, nota: $not <br> \n";
            
        }
    
    
        fclose($archivo);
    }
}

function buscar($archivoNotas){

    
    if (file_exists($archivoNotas)) {
        $nombreBuscado= $_REQUEST["nombreBuscado"];
        $contador=0;
        $archivo=fopen($archivoNotas,"r");

       /*  while (($linea = fgets($archivo)) != false) {
            $arrayUser = explode(":", $linea);
            if (trim($arrayUser[0]) == $nombreBuscado) {  // Usamos trim() en ambos para evitar problemas con espacios
                $contador++;
            }
        } */
        while (($linea = fgets($archivo)) !== false) {
            $arrayUser = explode(":", $linea);
            // Búsqueda case-insensitive con strcasecmp
            if (strcasecmp(trim($arrayUser[0]), $nombreBuscado) === 0) {
                // Mostrar cada coincidencia con nombre y nota
                echo "Nombre: " . trim($arrayUser[0]) . ", Nota: " . trim($arrayUser[1]) . "<br>
";
                $contador++;
            }
        }
       if ($contador>0) {
        echo"El nombre Buscado aparece $contador veces";
        echo"";
       }else{
        echo"El nombre Buscado NO aparece en el archivo";

       }

       fclose($archivo);


    }else{
        echo" NO EXISTE O NO SE PUDO ABRIR";
    }

}

function resetearFichero($archivoNotas) {
    // Abre el archivo en modo escritura, lo trunca a cero y lo cierra
    $archivo = fopen($archivoNotas, "w");
    fclose($archivo);
    echo "<b>El fichero se ha reiniciado correctamente.</b>";
}

function abrirArchivo($arch){
    if (file_exists($arch)) {
        # echo"EXISTE...abriendo";
        $archivo = fopen($arch, "a+");
    }else{
        # echo "NO EXISTE, creando...";
        $archivo = fopen($arch, "a+");
    }
    
}
?>
</div>


</body>
</html>
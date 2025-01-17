<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

$archivoDatos = "archivoDatos.txt";
abrirArchivo($archivoDatos); # al inicio para abrir o crear si no existe


if (isset($_REQUEST["enviar"])) {
    
    guardarUser($archivoDatos);
   
}

if (isset($_REQUEST["mostrar"])) {
    mostrarUsers($archivoDatos);
}
if (isset($_REQUEST["buscar"])) {
    buscar($archivoDatos);
}






function guardarUser($archivoDatos){
    $nombre= trim($_REQUEST["nombre"]);
    $apellido1= trim($_REQUEST["apellido1"]);
    $apellido2= trim($_REQUEST["apellido2"]);
    $telefono= trim($_REQUEST["telefono"]);
    $email= trim($_REQUEST["email"]);

    #guardar datos en array, separados en coma y salto de linea final
    $datos= "$nombre, $apellido1, $apellido2, $telefono, $email\n";
    
    #damos  referencia al archivo al abrirlo
    $archivo=fopen($archivoDatos,"a+");
    fputs($archivo, $datos); # FPUTS necesita la ref del archivo abierto, y el array/string
    fclose($archivo);
}

function mostrarUsers($archivoDatos){

    if(file_exists($archivoDatos)){
        $archivo=fopen($archivoDatos,"r" );
        echo "LOS USUARIOS GUARDADOS SON:<br>";

        while(($linea=fgets($archivo))!= false){
            #ahora usamos el xplode con separador de elementos
            $arrayUser = explode(",", $linea);
            $nom = $arrayUser[0];
            $ap1 = $arrayUser[1];
            $ap2 = $arrayUser[2];
            $tel = $arrayUser[3];
            $em = $arrayUser[4];

           

            echo "Nombre: $nom, Apellidos: $ap1 $ap2, Teléfono: $tel, Email: $em <br>";
            
        }
    
    
        fclose($archivo);
    }
}

function buscar($archivoDatos){

    
    if (file_exists($archivoDatos)) {
        $nombreBuscado= $_REQUEST["nombreBuscado"];
        $contador=0;
        $archivo=fopen($archivoDatos,"r");

        while (($linea = fgets($archivo)) != false) {
            $arrayUser = explode(",", $linea);
            if (trim($arrayUser[0]) == $nombreBuscado) {  // Usamos trim() en ambos para evitar problemas con espacios
                $contador++;
            }
        }
       if ($contador>0) {
        echo"El nombre Buscado aparece $contador veces";
       }else{
        echo"El nombre Buscado NO aparece en el archivo";

       }

       fclose($archivo);


    }else{
        echo" NO EXISTE O NO SE PUDO ABRIR";
    }

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


    <form action="#" method="post">
        <h2>INTRODUCION DATOS</h2>
        <input type="text" name="nombre" placeholder="Nombre1" required>
        <input type="text" name="apellido1" placeholder="Apellido1" required>
        <input type="text" name="apellido2" placeholder="Apellido2">
        <input type="number" name="telefono" placeholder="Telefono">
        <input type="email" name="email" placeholder="Email">
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
</body>
</html>
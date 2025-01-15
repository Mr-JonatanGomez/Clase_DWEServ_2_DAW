<?php
$archivo_datos = "equipos.txt";
 # Modo r, read
$i=0;
if (file_exists($archivo_datos)) {
    echo "EL ARCHIVO SI EXISTE";
    $archivo=fopen($archivo_datos,"r");
}else{
    echo "EL ARCHIVO NO EXISTE....Creandolo ahora con fopen(), que sirve para abrir o para crear si no existe";
    //crear archivo
    $archivo = fopen($archivo_datos,"a+");
}


while( ($linea=fgets($archivo)) !== false ){
            // explode devuelve array formateado con separador
            // estructura de los datos: codigo_equipo_acb, nombre_equipo, ciudad 
            $arrayDatos =   explode(";", $linea);
			// var_dump($arrayDatos);
         
            $nombres[$i] = $arrayDatos[1];   
			$i++;
}			
fclose($archivo);
echo "<br><br>El número de elementos en el array es: " . count($nombres)."<br>";
sort($nombres); // ordena un array
for($i=0;$i<=count($nombres)-1;$i++)
{
   echo " $nombres[$i] <br>";
}



?>
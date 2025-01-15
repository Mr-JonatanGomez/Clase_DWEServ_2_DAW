<?php
$archivo_datos = "datosPenya.txt";
 # Modo r, read
$i=0;
if (file_exists($archivo_datos)) {
    echo "EL ARCHIVO YA EXISTE";
    $archivo=fopen($archivo_datos,"r");
}else{
    echo "EL ARCHIVO NO EXISTE....Creandolo ahora con fopen(), que sirve para abrir o para crear si no existe";
    //crear archivo
    $archivo = fopen($archivo_datos,"a+");
}

echo"<br><br>MOSTRANDO INTEGRANTES DE LA PEÑA<br><br>";
/* while( ($linea=fgets($archivo)) !== false ){
            // explode devuelve array formateado con separador
            // estructura de los datos: numero_id, nombre, ciudad 
            $arrayDatos =   explode(",", $linea);
			// var_dump($arrayDatos);
         
            $nombres[$i] = $arrayDatos[1];   
			$i++;
}	 */

while( ($linea=fgets($archivo)) !== false ){
 
    // estructura de los datos: numero_id, nombre, ciudad 
    $arrayDatos =   explode(",", $linea);
    // var_dump($arrayDatos);
    $numero_id = trim($arrayDatos[0]);
    $nombre = trim($arrayDatos[1]);   
    $ciudad =  trim($arrayDatos[2]);   
    echo "Nº de Socio: $numero_id";
    echo ";  Nombre: $nombre ";
    echo ";  Ciudad: $ciudad<br>";

    $nombres[]=$nombre;#metemos los nombre en nombres para poder contarlos
}	
fclose($archivo);
echo "<br><br>El número de integrantes registrados es : " . count($nombres)."<br>";
#sort($nombres); // ordena un array




?>
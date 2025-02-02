<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATABASES</title>
</head>
<body>
    


<?php
    $conexion = mysqli_connect("localhost", "root", "","productos")
    or die("Fallo en la conex".mysqli_connect_error());
/* 8.	Saca los gastos totales de los clientes ordenados por edad sacado con PAGOS */
    $query= 
        "SELECT clientes.id_cliente, clientes.nombre, clientes.edad,
        SUM(pagos.cantidad_pagada) AS Total_Pagado

        FROM clientes

        LEFT JOIN pagos USING(id_cliente)
        GROUP BY clientes.id_cliente, clientes.nombre, clientes.edad
        ORDER BY clientes.edad ASC
        
        ";



/* PARA HACER LA CONSULTA se requiere la conexion y la query */
$consulta = mysqli_query($conexion, $query);
/*
 $nFilas = mysqli_num_rows($query);

if ($nFilas>0) {
    for ($i=0; $i < $nFilas ; $i++) { 
        $fila= mysqli_fetch_assoc($query);
    }
}

mysqli_close($conexion); */



?>



</body>
</html>
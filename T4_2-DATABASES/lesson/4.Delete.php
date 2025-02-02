<?php
$conexion = mysqli_connect("","","","");
if (!$conexion) {
    die("ERROR DE CONEXION". mysqli_connect_error());
}
$idEliminar=$_REQUEST["idEliminar"];
$idEliminar=trim(strip_tags($idEliminar));

$query="DELETE FROM productos WHERE id.productos = $idEliminar";


mysqli_close($conexion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="#"></form>
</body>
</html>
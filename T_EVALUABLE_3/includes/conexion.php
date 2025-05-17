<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventos_tech";

$conexion = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexion) {
    die("ERROR DE CONEXIÓN: " . mysqli_connect_error());
}
?>
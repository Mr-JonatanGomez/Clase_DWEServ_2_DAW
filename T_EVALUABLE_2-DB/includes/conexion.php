<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inmobiliaria_jonatangomez";

$conexion = mysqli_connect($servername, $username, $password, $dbname);

if (!$conexion) {
    die("ERROR DE CONEXIÓN: " . mysqli_connect_error());
}
?>
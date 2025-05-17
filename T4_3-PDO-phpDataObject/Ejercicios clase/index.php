<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title> Ejercicios PDO</title>
  <link rel="stylesheet" href="estilos.css" title="Color">
</head>

<body>
  <h1>PDO Ejemplos mysql</h1>

  <main>
<?php
require_once "biblioteca.php";

$pdo = conectaDb();

borraTodo();

insertaRegistro("Juan", "Garcia");

cuentaRegistros();

muestraRegistros();

modificaRegistro(1, "Paco", "Luis");

muestraRegistros();

insertaRegistro("Ana", "Nigerio");

cuentaRegistros();

muestraRegistros();

borraRegistros([1 => "on"]);

muestraRegistros();


print "</body>\n";
print "</html>\n";

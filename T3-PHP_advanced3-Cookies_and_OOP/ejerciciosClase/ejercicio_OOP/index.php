<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
# PARA PODER USAR LAS CLASES HAY QUE INCLUIRLAS CON INCLUDE


#o podemos probar esto en lugar de todos los includes

spl_autoload_register(function ($class) {
    include_once $class . '.php';
});



/* include_once 'Gato.php';
include_once "Perro.php"; */

$gato1 = new Gato("macho", "gato callejero", "Gardfield", "naranja y negro");
$perro1=new Perro("hembra", "collie escocés", "Lassie", "anaranjado y blanco");

echo $gato1;
echo $gato1->treparArbol();
echo "<br><br>";
echo $perro1;
echo $perro1->ladrar();



?>
    
</body>
</html>

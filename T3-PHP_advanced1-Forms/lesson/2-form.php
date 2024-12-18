<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form action="2-saluda.php" method="post">
Nombre :  <input type="text" name="nombre"><br>
Password: <input type="password" name="password"><br>
<input type="submit" value="enviar"><br><br>

Opciones de la Casa: <br>
<input type="checkbox" name="extras[]" value="garaje"> garaje <br>
<input type="checkbox" name="extras[]" value="piscina"> piscina<br>
<input type="checkbox" name="extras[]" value="jardin"> jardin<br>
<input type="checkbox" name="extras[]" value="alarma"> alarma<br>
<p>En los input de tipo checkbox, el name debe recoger array, ya que al 
    poder seleccionar varias opciones, deberan guardarse en un array e 
    imprimirse con un foreach o for </p><br><br>



</form>


</body>
</html>
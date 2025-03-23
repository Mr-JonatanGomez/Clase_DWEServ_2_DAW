<?php
if (isset($_REQUEST["enviar"])) {
    $conn = mysqli_connect('localhost','root','','inventario');

if (!$conn) {
    die("conexion fallida". mysqli_connect_error());
    
}

$id = mysqli_real_escape_string($conn, $_REQUEST['busqueda']);
$query = "SELECT * FROM productos WHERE id LIKE $id";
$resultado = mysqli_query($conn, $query);

if (mysqli_num_rows($resultado)>0) {
    echo "<ul>";
    while($row = mysqli_fetch_assoc($resultado)){
        echo '<li>ID: ' . $row['id'] . ', Nombre: ' . $row['nombre'] . ', Cantidad: ' . $row['cantidad'] . ', Precio: ' . $row['precio'];
    }


    echo "</ul>";
}else{
    echo "No se encontraron resultados";
}

mysqli_close($conn);
}else{
?>

<!DOCTYPE html>
<html>
<head>
    <title>Buscador de Productos</title>
    <style>
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Buscador de Productos</h1>
    
    <form method="POST" action="">
        <input type="text" name="busqueda" placeholder="nombredel producto">
        <button type="submit" name="enviar" value="Buscar">Buscar</button>
    </form>

   
    
    
</body>
</html>



<?php
}

?>



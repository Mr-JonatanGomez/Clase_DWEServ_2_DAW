<?php
$conn = mysqli_connect('localhost', 'root', '', 'tiendaBasicPHP');

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $sql = "INSERT INTO productos (nombre) VALUES ('$nombre')";

    if (mysqli_query($conn, $sql)) {
        echo "Producto añadido exitosamente.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }


mysqli_close($conn);
?>

<a href="indice.php">Volver al menú</a>

<!DOCTYPE html>
<html>
<head>
    <title>Añadir Producto</title>
</head>
<body>
    <h1>Añadir Producto</h1>
    <form method="post" action="#">
        <label for="nombre">Nombre del Producto:</label>
        <input type="text" name="nombre" required>
        <input type="submit" value="Añadir">
    </form>
    <a href="indice.php">Volver al menú</a>
</body>
</html>
<?php
// Conexión a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "usuario";
$password = "contraseña";
$dbname = "mi_base_de_datos";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre de usuario de la entrada del usuario (¡VULNERABLE!)
$username = $_GET['username'];

// Crear la consulta SQL (¡VULNERABLE!)
$sql = "SELECT * FROM usuarios WHERE username = '$username'";

// Ejecutar la consulta
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mostrar los datos
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nombre: " . $row["username"]. "<br>";
    }
} else {
    echo "0 resultados";
}
$conn->close();
?>
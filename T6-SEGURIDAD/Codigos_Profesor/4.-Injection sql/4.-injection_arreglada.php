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

// Obtener el nombre de usuario de la entrada del usuario
$username = $_GET['username'];

// Crear la consulta preparada
$sql = "SELECT * FROM usuarios WHERE username = ?";

// Preparar la consulta
$stmt = $conn->prepare($sql);

// Vincular los parámetros
$stmt->bind_param("s", $username); // "s" indica que $username es una cadena

// Ejecutar la consulta
$stmt->execute();

// Obtener los resultados
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Mostrar los datos
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Nombre: " . $row["username"]. "<br>";
    }
} else {
    echo "0 resultados";
}

$stmt->close();
$conn->close();
?>
<?php
// Mejores prácticas para el control seguro de formularios en PHP

// 1. Validar y sanear datos de entrada
//    - Utilizar filter_input() para obtener los datos del formulario de forma segura.
//    - filter_var() con los filtros apropiados para validar y sanear los datos.
//    - Ejemplo:
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = filter_input(INPUT_POST, "nombre", FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);
        $edad = filter_input(INPUT_POST, "edad", FILTER_VALIDATE_INT);

        // Validar que los datos son válidos
        if ($nombre === false || $email === false || $edad === false) {
            die("Error: Datos de formulario inválidos.");
        }

        // Realizar acciones con los datos saneados y validados
        echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
        echo "Email: " . htmlspecialchars($email) . "<br>";
        echo "Edad: " . htmlspecialchars($edad) . "<br>";
    }

// 2. Escapar la salida de datos
//    - Utilizar htmlspecialchars() para escapar los datos antes de mostrarlos en el navegador.
//    - Esto evita que se ejecute código HTML o JavaScript malicioso.
//    - Ejemplo:
//      echo "Nombre: " . htmlspecialchars($nombre);

// 3. Proteger contra CSRF (Cross-Site Request Forgery)
//    - Generar un token único para cada formulario y verificarlo al procesar el formulario.
//    - Ejemplo:
    session_start();
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    $csrf_token = $_SESSION['csrf_token'];

    // Verificar el token CSRF al procesar el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $csrf_token_recibido = filter_input(INPUT_POST, "csrf_token");
        if (!hash_equals($csrf_token, $csrf_token_recibido)) {
            die("Error: Token CSRF inválido.");
        }
    }

// 4. Validar el lado del servidor
//    - La validación del lado del cliente es conveniente, pero no es segura.
//    - Siempre realizar la validación del lado del servidor para garantizar la seguridad.
//    - Ejemplo:
//      (Ver el ejemplo de validación de datos de entrada arriba)

// 5. Utilizar HTTPS
//    - Utilizar HTTPS para cifrar la comunicación entre el navegador y el servidor.
//    - Esto protege los datos del formulario de la interceptación.
//    - Configurar el servidor web para utilizar HTTPS y obtener un certificado SSL/TLS válido.

// 6. Configurar las cabeceras de seguridad
//    - Configurar las cabeceras de seguridad HTTP para proteger contra ataques como XSS y clickjacking.
//    - Ejemplo:
//      header("X-Frame-Options: SAMEORIGIN");
//      header("X-XSS-Protection: 1; mode=block");
?>

<form action="formulario.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" id="nombre"><br><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email"><br><br>
    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad"><br><br>
    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
    <input type="submit" value="Enviar">
</form>
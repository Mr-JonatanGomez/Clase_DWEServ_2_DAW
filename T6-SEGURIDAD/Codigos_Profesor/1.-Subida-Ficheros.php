<?php
// Directorio donde se guardarán los archivos subidos (debe estar fuera del directorio web accesible)
$upload_dir = "/var/www/uploads/";

// Nombre del campo del formulario para la subida del archivo
$file_field = "archivo_subido";

// Tamaño máximo permitido para el archivo (en bytes)
$max_file_size = 2097152; // 2MB

// Tipos de archivo permitidos (lista blanca)
$allowed_types = ["image/jpeg", "image/png", "application/pdf"];

// Verificar si se ha enviado un archivo
if (isset($_FILES[$file_field]) && $_FILES[$file_field]["error"] == UPLOAD_ERR_OK) {

    $file_name = $_FILES[$file_field]["name"];
    $file_type = $_FILES[$file_field]["type"];
    $file_size = $_FILES[$file_field]["size"];
    $file_tmp_name = $_FILES[$file_field]["tmp_name"];

    // 1. Validar el tipo de archivo
    if (!in_array($file_type, $allowed_types)) {
        die("Error: Tipo de archivo no permitido.");
    }

    // 2. Validar el tamaño del archivo
    if ($file_size > $max_file_size) {
        die("Error: El archivo excede el tamaño máximo permitido.");
    }

    // 3. Generar un nombre de archivo único y seguro
    $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
    $new_file_name = uniqid("file_", true) . "." . $file_ext; // Genera un nombre único con prefijo "file_"
    $destination_path = $upload_dir . $new_file_name;

    // 4. Mover el archivo subido al directorio de destino
    if (move_uploaded_file($file_tmp_name, $destination_path)) {
        echo "Archivo subido correctamente. Nombre: " . htmlspecialchars($new_file_name);
        // Importante: No mostrar la ruta completa del archivo al usuario por seguridad.
    } else {
        die("Error al mover el archivo al directorio de destino.");
    }

} else {
    // Manejar errores de subida de archivos
    switch ($_FILES[$file_field]["error"]) {
        case UPLOAD_ERR_INI_SIZE:
            die("Error: El archivo excede la directiva upload_max_filesize en php.ini.");
        case UPLOAD_ERR_FORM_SIZE:
            die("Error: El archivo excede la directiva MAX_FILE_SIZE especificada en el formulario.");
        case UPLOAD_ERR_PARTIAL:
            die("Error: El archivo se subió solo parcialmente.");
        case UPLOAD_ERR_NO_FILE:
            die("Error: No se subió ningún archivo.");
        case UPLOAD_ERR_NO_TMP_DIR:
            die("Error: Falta la carpeta temporal.");
        case UPLOAD_ERR_CANT_WRITE:
            die("Error: Error al escribir el archivo en el disco.");
        case UPLOAD_ERR_EXTENSION:
            die("Error: La extensión del archivo detuvo la subida.");
        default:
            die("Error desconocido al subir el archivo.");
    }
}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <label for="archivo_subido">Selecciona un archivo:</label>
    <input type="file" name="archivo_subido" id="archivo_subido">
    <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo $max_file_size; ?>">
    <button type="submit">Subir archivo</button>
</form>
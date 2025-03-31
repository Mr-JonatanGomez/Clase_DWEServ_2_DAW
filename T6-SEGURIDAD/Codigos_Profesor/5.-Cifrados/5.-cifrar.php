<?php

// Cifrar la contraseña
$password = "mi_contraseña_segura";
$hash = password_hash($password, PASSWORD_DEFAULT);

echo "Contraseña original: $password\n";
echo "Hash de la contraseña: $hash\n";

// Verificar la contraseña
$contraseña_introducida = "mi_contraseña_segura"; // Puedes cambiar esto para probar con una contraseña incorrecta

if (password_verify($contraseña_introducida, $hash)) {
    echo "La contraseña es válida.\n";
} else {
    echo "La contraseña no es válida.\n";
}

?>

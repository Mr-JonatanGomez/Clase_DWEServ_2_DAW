<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

    ?>
</body>
</html> -->

<?php
// Generar tres números aleatorios entre 5 y 20
$numeros = [];
for ($i = 0; $i < 3; $i++) {
    $numeros[] = rand(5, 20);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número y Cuadrado</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Números Aleatorios y su Cuadrado</h1>
    <table>
        <thead>
            <tr>
                <th>Número</th>
                <th>Cuadrado del Número</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Mostrar los números y su cuadrado
            foreach ($numeros as $numero) {
                echo "<tr>";
                echo "<td>$numero</td>";
                echo "<td>" . ($numero * $numero) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

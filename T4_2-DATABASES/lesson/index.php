<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>


    <!-- ES EL COMANDO MAS ACTUAL PARA NO USAR DOS -->
$mysqli_connect(servidor, username, password, database) => 

$mysqli_connect("localhost", "root", "", "tienda")


esto devuelve una variablw de conexion


$consulta = misqli_query ($conexion, instruccion);

=> $consulta = misqli_query ($conexion, instruccion);
or die es como el IF 



    </p>

    <h1>Conexion a bases de datos</h1>
    <h2>1º necesitamos conectar con el servidor, 
        necesitamos darle a la conex: <b>servidor. 
        user, pass, database</b></h2>

        <h1>COMANDOS BASICOS</h1>
        <ul>
            <li>mysqli_connect() -> connect to server</li>
            <li>mysqli_select_db() -> seleccionar database (YA NO SE USA CASI)</li>
            <li>mysqli_query() -> envia instruccion sql a DB</li>
            <li>mysqli_num_rows() -> devuelve el numero de filas</li>
            <li>mysqli_fetch_assoc() -> convierte lo recogido en aray</li>
            <li>mysqli_close() -> cierra conexion</li>
        </ul>

        <h2>EJEMPLO</h2>
        <h4>$conexion = $mysqli_connect("localhost", "root", "","productos")
            or die ("No se ha podido conectar al server")

            <b>or die es solo si falla </b>
        </h4>
</body>
</html>
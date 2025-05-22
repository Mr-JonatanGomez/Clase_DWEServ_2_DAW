


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    

    
    <div class="container">
        <h2>INSERTAR</h2>
        <form action="" method="POST">
        nombre <input type="text" name="nombre" required>
        email <input type="text" name="email" required>
        edad <input type="text" name="edad" required>
        <input type="submit" name="enviar" value="Guardar USER en DB">
        
    </form>
    </div>
    <div class="container">
        <h2>MOSTRAR/OCULTAR</h2>
        <form action="" method="POST" style="display: flex; flex-direction:column">
            
                Elige id para mostrar: <input type="text" name="mostrarId" style="max-width: fit-content;">
                <input type="submit" name="mostrarIdbtn" value="MOSTRAR USUARIO CON ID ELEGIDO" style="max-width: fit-content;">

            <hr>
            <input type="submit" name="mostrar" value="MOSTRAR TODOS USERs en DB" style="max-width: fit-content;">
            <hr>
            <input type="submit" name="ocultar" value="OCULTAR DATOS" style="max-width: fit-content;">
        </form>
    </div>
    
    <div class="container">
        <h2>EDITAR USER</h2>
        <form action="" method="POST">
            ID del usuario a actualizar: <input type="number" name="id" required><br>
            Nuevo nombre: <input type="text" name="nombre" required><br>
            Nuevo email: <input type="text" name="email" required><br>
            Nueva edad: <input type="number" name="edad" required><br>
            <input type="submit" name="actualizar" value="ACTUALIZAR USER por ID">
        </form>
    </div>

    <div class="container">
        <h2>ELIMINAR</h2>
        <form action="" method="POST">
        ID del usuario a eliminar: <input type="number" name="id" required>
        <input type="submit" name="eliminar" value="ELIMINAR USER por ID">
        </form>
    </div>

    <div>
    <?php
$contenido="";
function agregarUsuario(){
    $conexion = mysqli_connect("localhost", "root", "", "examensim");
    if (!$conexion) {
        die("Conexion fallida". mysqli_connect_error($conexion));
    }
    
        $nombre = $_REQUEST["nombre"];
        $email = $_REQUEST["email"];
        $edad = $_REQUEST["edad"];


        $nombreUser= mysqli_real_escape_string($conexion, $nombre);
        $emailUser= mysqli_real_escape_string($conexion, $email);
        $edadUser= mysqli_real_escape_string($conexion, $edad);
        $query= "INSERT INTO usuarios (nombre, email, edad) VALUES ('$nombreUser', '$emailUser', $edadUser) "; 

        
        $filasAfectadas= mysqli_affected_rows($conexion);
        
        if (mysqli_query($conexion, $query)) { #ejecuta la query
            
            echo "USER AGREGADO";
        }else{
            echo "Error al guardar, no puedes guardar datos vacios" . mysqli_error($conexion);
        }

        mysqli_close($conexion);
}

function mostrarTodos(){

    $conexion= mysqli_connect("Localhost", "root", "", "examensim");
    if (!$conexion) {
        die("Error de Conexion". mysqli_connect_error());
    }
    
    $query= "SELECT id, nombre, email, edad FROM usuarios ";
    $resultadoQuery= mysqli_query($conexion, $query);
    
   
    if (mysqli_num_rows($resultadoQuery)>0) {

        echo "<ul>";
        while ($row=mysqli_fetch_assoc($resultadoQuery)) {
            echo "<li> ID: ". $row["id"]." |  Nombre: ". $row["nombre"]." |  email: ". $row["email"]." |  edad: ". $row["edad"];
            echo "<hr>";
        }
        echo "</ul>";
    }else{
        echo "No hay users para mostrar";
    }

    mysqli_close($conexion);
}
function mostrarId(){

    $conexion= mysqli_connect("Localhost", "root", "", "examensim");
    if (!$conexion) {
        die("Error de Conexion". mysqli_connect_error());
    }
    $id = $_REQUEST["mostrarId"];

    $query= "SELECT id, nombre, email, edad FROM usuarios WHERE id = $id";
    $resultadoQuery= mysqli_query($conexion, $query);
    
   
    if (mysqli_num_rows($resultadoQuery)>0) {

        echo "<ul>";
        while ($row=mysqli_fetch_assoc($resultadoQuery)) {
            echo "<li> ID: ". $row["id"]." |  Nombre: ". $row["nombre"]." |  email: ". $row["email"]." |  edad: ". $row["edad"];
            echo "<hr>";
        }
        echo "</ul>";
    }else{
        echo "No hay users para mostrar";
    }

    mysqli_close($conexion);
}

function eliminarUsuarioPorId(){
    $conexion = mysqli_connect("localhost", "root", "", "examensim");
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $id = $_REQUEST["id"];

    $query = "DELETE FROM usuarios WHERE id = $id";
    
    if (mysqli_query($conexion, $query)) {
        echo "Usuario con ID $id eliminado correctamente.";
    } else {
        echo "Error al eliminar usuario: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}

function actualizarUsuarioPorId(){
    $conexion = mysqli_connect("localhost", "root", "", "examensim");
    if (!$conexion) {
        die("Error de conexión: " . mysqli_connect_error());
    }

    $id = $_REQUEST["id"];
    $nombre = $_REQUEST["nombre"];
    $email = $_REQUEST["email"];
    $edad = $_REQUEST["edad"];

    $query = "UPDATE usuarios SET nombre='$nombre', email='$email', edad=$edad WHERE id=$id";

    if (mysqli_query($conexion, $query)) {
        echo "Usuario con ID $id actualizado correctamente.";
    } else {
        echo "Error al actualizar usuario: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}

if (isset($_REQUEST["actualizar"])) {
    actualizarUsuarioPorId();
}

if (isset($_REQUEST["eliminar"])) {
    eliminarUsuarioPorId();
}

if (isset($_REQUEST["enviar"])) {
    agregarUsuario();
}
if (isset($_REQUEST["mostrar"])) {
$contenido= mostrarTodos();
}
if (isset($_REQUEST["mostrarIdbtn"])) {
$contenido= mostrarId();
}

if (isset($_REQUEST["ocultar"])) {
    $contenido = "";
}

?>
    </div>

</body>
</html>
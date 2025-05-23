<?php
    session_start();
    

if (isset($_REQUEST["cerrar-sesion"])) {
    
    unset($_SESSION["email"]);
    unset($_SESSION["tipo_usuario"]);
    unset($_SESSION["id_usuario"]);
    session_destroy();
    

    /* para enviar al menu inicial al cerrar sesion */
    header("Location: index.php"); // o la página que desees
    exit();
}


if(isset($_REQUEST["delete"])){
    include './includes/conexion.php';
    if ($conexion) {
        
        /* COMPROBAR PASSWORD IGUAL */
        $password = mysqli_real_escape_string($conexion,$_REQUEST["password"]);
        $password2 = mysqli_real_escape_string($conexion,$_REQUEST["password2"]);
        if ($password != $password2) {
            echo '<div class="alertas d-flex justify-content-around align-items-center pt-3">
                    <div class="alert alert-danger w-50 text-center d-flex justify-content-around" role="alert">
                        <b>LAS CONTRASEÑAS NO COINCIDEN</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>';
        
        }else {
            

            $nombre = mysqli_real_escape_string($conexion,$_REQUEST["nombre"]);
            $email = mysqli_real_escape_string($conexion,$_REQUEST["email"]);
            $tipo = mysqli_real_escape_string($conexion,$_REQUEST["tipo"]);
        
            $query= "   DELETE FROM usuarios 
                                (nombre, correo, password, tipo_usuario)
                        VALUES ('$nombre','$email','$password','$tipo');
                    ";
            if (mysqli_query($conexion,$query)) {
                echo '<div class="alertas d-flex justify-content-center">
                                <div class="alert alert-success w-50 text-center d-flex justify-content-around" role="alert">
                                    <b>USUARIO ELIMINADOCORRECTAMENTE</b>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                </div>
                            </div>';
    
                         
            } else{
                echo "Error al realizar el insert con la query:". $query. mysqli_error($conexion);
    
            }


        }


    }

    



}
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete_user</title>
    <?php include './includes/head-libraries.php'; ?>
</head>
<body>



<header class="p-4">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Inmobiliaria JGomez</h1>
            </div>

        </div>
        <!-- <div class="titulo d-flex flex-row justify-content-center">
        </div> -->

        <div class="row">

            <div class="navbar col-sm-8 justify-content-center justify-content-md-start">
                <ul class="nav justify-content-center justify-content-sm-start">
                    <li class="nav-item p-3">
                        <a class="nav-link" href="./index.php">VOLVER</a>
                    </li>
                    <!-- <li class="nav-item p-3">
                        <a class="nav-link"href="./login.php">INICIAR SESION</a>
                    </li>
                    <li class="nav-item p-3">
                        <a class="nav-link" href="#">REGISTRARSE</a>
                    </li> -->
                        
                        
                </ul>
            </div>

            <div class="sesion col-sm-4 d-flex flex-column align-items-center align-items-md-end justify-content-center px-5">
       
                    <h6 class="user-activo text-center text-sm-end">
    <?php
                    if (isset($_SESSION["email"])) {
                    echo "usuario: ";
                    echo $_SESSION["email"];
                    echo "<br>tipo: ";
                    echo $_SESSION["tipo_usuario"];
                    }else{
                        echo"";
                    }
    ?>
                    </h6>
    <?php
                    if (isset($_SESSION["email"])) {
                    ?>
                    <form action="" method="post">
    
    
                        <input type="submit" class="btn btn-danger" name="cerrar-sesion" id="cerrar-sesion" value="cerrar-sesion">
                    </form>
                    <?php
                    }else{
                        echo"";
                    }
    ?>               

            </div>
        </div>

</header>

<main class="container-lg container-forms">

    <form class="standarForm" action="./delete.php" method="post">
    
        <h1 class="titulo text-danger text-center mb-3">ELEMINAR USUARIO</h1>
        <div class="mb-3 row">
            <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="email" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="email" name="email" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword" name="password" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-3 col-form-label">Confirmar Password</label>
            <div class="col-sm-8">
                <input type="password" class="form-control" id="inputPassword2" name="password2" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="tipo" class="col-sm-4 col-form-label">Tipo</label>
            <div class="col-sm-8 d-flex align-items-center justify-content-around">
                <label for="comprador">comprador  <input type="radio" id="comprador" name="tipo" value="comprador" required></label>
                <label for="vendedor">vendedor  <input type="radio" id="vendedor" name="tipo" value="vendedor"></label>
            </div>
        </div>
        
        <div class="mt-4 row justify-content-center">
            
            <div class="col-sm-6 col-md-8 d-flex justify-content-center">
            <input type="submit" class="form-control btn btn-primary" id="delete" name="delete" value="Registrarse e Iniciar Sesion">
            </div>
        </div>
    
    
    </form>
</main>

<footer></footer>
</body>
</html>
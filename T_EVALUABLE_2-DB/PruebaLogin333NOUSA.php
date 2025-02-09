<?php
    session_start();
    $userEncontrado=false;
    $passwordCorrecta=false;
    $usuarioIntro;
    $passwordIntro;
    $passwwordDB;
    $tipoUserActual;

if (isset($_REQUEST["cerrar-sesion"])) {
    
    unset($_SESSION["email"]);
    session_destroy();
    $tipoUserActual="";

    /* para enviar al menu inicial al cerrar sesion */
    header("Location: index.php"); // o la página que desees
    exit();
}

if (isset($_REQUEST["iniciar-sesion"])) {
/* 
    BUSCAMOS USER EN DATABASE
    SI EXISTE-LANZAMOS SW y al MENU CORRESPONDIENTE (if admin, compr, vend)
*/
    $conexion = mysqli_connect("localhost","root","","inmobiliaria_jonatangomez");

    if (!$conexion) {
        die("Hubo un error de conexion. ".mysqli_connect_error());
    }

    $usuarioIntro=trim(strip_tags($_REQUEST["email"]));
    $passwordIntro=trim(strip_tags($_REQUEST["password"]));

    $query="SELECT correo, password, tipo_usuario FROM usuarios WHERE correo = '$usuarioIntro';";
    $resultadoQuery= mysqli_query($conexion,$query);


    if (mysqli_num_rows($resultadoQuery)>0) {
        $userEncontrado=true;
        ($row=mysqli_fetch_assoc($resultadoQuery));
            $tipoUserActual= $row["tipo_usuario"];

        if ($row['password'] == $passwordIntro) {
            

            echo mysqli_num_rows($resultadoQuery). "numeroFIlas";
          
            echo '<div class="d-flex justify-content-center">
                        <div class="alert alert-success w-50 text-center" role="alert">
                            <b>USUARIO LOGUEADO CORRECTAMENTE</b>
                        </div>
                    </div>';

            $_SESSION["email"]=$usuarioIntro;
            
            switch ($tipoUserActual) {
                case 'admin':
                    header("Location: menuAdmin.php");
                    exit;
                    break;

                case 'comprador':
                    header("Location: menuAdmin.php");
                    exit;
                    break;

                case 'vendedor':
                    header("Location: menuAdmin.php");
                    exit;
                    break;    

                default:
                    echo"Error de tipo de user";
                    break;
            }





        }else{
            echo    '<div class="d-flex justify-content-center">
                        <div class="alert alert-danger w-50 text-center" role="alert">
                            <b>El password es incorrecto</b>
                        </div>
                    </div>';
        }
        

        
    }else{
        echo    '<div class="d-flex justify-content-center">
                        <div class="alert alert-danger w-50 text-center" role="alert">
                            Este <b>USUARIO no existe</b> en la DataBase,<br><b>REGISTRESE</b>, o compruebe si lo ha introducido mal</b>
                        </div>
                    </div>';
    }

    if ($userEncontrado && $passwordCorrecta) {
        
    }



    mysqli_close($conexion);
}
    
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include './includes/head-libraries.php'; ?>
</head>
<body>
    <!-- 
ESTO VA A SER EL LOGIN


    AL HACER LOGIN HAY QUE VERIFICAR QUE USUARIO EXISTE, 
    Y SE SER ASI, QUE EL PASSWORD COINCIDE EN LA DATABASE

    TAREAS NECESARIAS :
    v 1-FORM CON CORREO Y PASS
    v 2-GUARDAR EN VARIABLE, y BUSCAR EN DATABASE SI EXISTE Y ES CORRECTO
    v 3-INICIAMOS session_start()con el correo
    v 3.1- CERRAR SESION
    4-MANDAMOS AL MENU QUE CORRESPONDA--ADMIN, COMPRA, VENDE
        IF TIPO....

    -->

    <header class="p-4">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Inmobiliaria JGomez</h1>
            </div>

        </div>
        <!-- <div class="titulo d-flex flex-row justify-content-center">
        </div> -->

        <div class="row">

            <div class="navbar col-8 text-left">
                <ul class="nav justify-content-start">
                    <li class="nav-item">
                        <a class="nav-link" href="#">VER PISOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./login.php">INICIAR SESION</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">REGISTRARSE</a>
                    </li>
                        
                        
                </ul>
            </div>

            <div class="sesion col-4 d-flex flex-column align-items-end">
       
                    <h6 class="user-activo">
    <?php
                    if (isset($_SESSION["email"])) {
                    echo "usuario: ";
                    echo $_SESSION["email"];
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

<main class="container-lg">

    <form class="standarForm" action="" method="post">
    
        <div class="mb-3 row">
        <label for="email" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email">
        </div>

        </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                <input type="password" class="form-control" id="inputPassword" name="password">
            </div>
        </div>
        
        <div class="mt-4 row justify-content-center">
            
            <div class="col-sm-8 d-flex justify-content-center">
            <input type="submit" class="form-control btn btn-success" id="iniciar-sesion" name="iniciar-sesion" value="Iniciar Sesion">
            </div>
        </div>

        <div class="mt-3 row justify-content-center">
            
            <div class="col-sm-8 d-flex justify-content-center">
                <a class="form-control btn btn-primary" href="./registro.php">Registrarse</a>
            </div>
        </div>
    
    
    </form>
</main>

<footer></footer>
    <script src="./utils/js/sweet.js"></script>
</body>
</html>
<?php


session_start();

if (isset($_REQUEST["cerrar-sesion"])) {
    
  unset($_SESSION["email"]);
  unset($_SESSION["tipo_usuario"]);
  unset($_SESSION["id_usuario"]);
  session_destroy();
  /* $tipoUserActual=""; */

  /* para enviar al menu inicial al cerrar sesion */
  header("Location: index.php"); // o la página que desees
  exit();
}

/* FUNCIONES */


function comprobarUser($id_user_desde_form, $user_boolean){
    # si existe, pasamos user_boolean a true;
    
    $conexion = mysqli_connect("localhost", "root", "inmobiliaria_jonatangomez", );

    if($conexion){
        $query= "SELECT * FROM usuarios WHERE id_usuario = $id_user_desde_form";
        $resultado=mysqli_query($conexion,$query);

        if (mysqli_num_rows($resultado)>0) {
            $user_boolean=true;
        }else{
            echo'<div class="alertas d-flex justify-content-center">
                        <div class="alert alert-warning w-50 text-center d-flex justify-content-around" role="alert">
                            <b>EL USUARIO NO EXISTE</b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                       
                    </div>';
        }


    }else{
        #esta vez le damos vuelta a la logica, creando primero el si hay conexion... 
        die("ERROR DE CONEXION MYSQL". mysqli_connect_error());
    }



    mysqli_close($conexion);
}





function deleteUser($id_user_desde_form){
    $user_existe=false;
    comprobarUser($id_user_desde_form,$user_existe);
    
    $conexion = mysqli_connect("localhost", "root", "inmobiliaria_jonatangomez", );
    
    if ($conexion && $user_existe) {
        # code para eliminacion
        $query=" DELETE 
        FROM usuarios 
        WHERE id_usuario = $id_user_desde_form;
                ";

        if (mysqli_query($conexion, $query)) {
            echo'<div class="alertas d-flex justify-content-center">
                        <div class="alert alert-success w-50 text-center d-flex justify-content-around" role="alert">
                            <b>EL USUARIO con ID:  $id_user_desde_form </b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                       
                    </div>';
        }


    }else{
            
        die("ERROR DE CONEXION MYSQL". mysqli_connect_error());
    }
    mysqli_close($conexion);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Usuarios</title>
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
                
                <ul class="nav justify-content-center justify-content-md-start">

                <li class="nav-item p-3">
                    <a class="nav-link" href="./index.php">VOLVER</a>
                </li>
                <li class="nav-item p-3">
                    <a class="nav-link" href="./adminPiso.php">ADMIN PISOS</a>
                </li>
                
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
    <main class="container-lg">
    <div class="row p-2">
        <div class="col-12 text-center">
            <h3 class="title primary">
                ADMINISTRACION DE USUARIOS
            </h3>
        </div>
    </div>

    <div class="row mt-2 p-2">
        <div class="col-12 d-flex justify-content-center">
            <p class="d-inline-flex gap-1">
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample1">Nuevo</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false" aria-controls="multiCollapseExample2">Eliminar</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3" aria-expanded="false" aria-controls="multiCollapseExample3">Buscar</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample4" aria-expanded="false" aria-controls="multiCollapseExample4">Modificar</button>
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#multiCollapseExample5" aria-expanded="false" aria-controls="multiCollapseExample5">Mostrar</button>
            </p>
        </div>
    </div>
    
    <div class="row justify-content-center g-3" id="accordionExample">
        <!--elemento -->
        <div class="col-md-8 col-lg-6">
            <div class="collapse multi-collapse" id="multiCollapseExample1" data-bs-parent="#accordionExample">
                <div class="card card-body">
                    UNO
                </div>
            </div>
        </div>

        <!--elemento -->
        <div class="col-md-8 col-lg-6">
            <div class="collapse multi-collapse" id="multiCollapseExample2" data-bs-parent="#accordionExample">
                <div class="card card-body">
                   DOS This panel is hidden by default but revealed when the user activates the relevant trigger.
                </div>
            </div>
        </div>
        
        <!--elemento -->
        <div class="col-md-8 col-lg-6">
            <div class="collapse multi-collapse" id="multiCollapseExample3" data-bs-parent="#accordionExample">
                <div class="card card-body">
                   TRES.
                </div>
            </div>
        </div>
        
        <!--elemento -->
        <div class="col-md-8 col-lg-6">
            <div class="collapse multi-collapse" id="multiCollapseExample4" data-bs-parent="#accordionExample">
                <div class="card card-body">
                    CUATRO.
                </div>
            </div>
        </div>
        
        <!--elemento -->
        <div class="col-md-8 col-lg-6">
            <div class="collapse multi-collapse" id="multiCollapseExample5" data-bs-parent="#accordionExample">
                <div class="card card-body">
                    CINCO activates the relevant trigger.
                </div>
            </div>
        </div>
    </div>

   <!--  <div class="row">
        <div class="col-12">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card card-body">
                    Some placeholder content for the first collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="collapse multi-collapse" id="multiCollapseExample2">
                <div class="card card-body">
                    Some placeholder content for the second collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
                </div>
            </div>
        </div>
    </div> -->
    <footer></footer>
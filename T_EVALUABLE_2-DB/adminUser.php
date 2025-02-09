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


    <!-- BOTONES -->

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 row-cols-lg-5 mt-2 p-2">
        <!-- Botón Nuevo -->
        <div class="col mb-1">
            <button class="btn btn-success w-100" type="button"
                    data-bs-toggle="collapse" data-bs-target="#multiCollapseExample1"
                    aria-expanded="false" aria-controls="multiCollapseExample1">
            Nuevo
            </button>
        </div>
        
        <!-- Botón Eliminar -->
        <div class="col mb-1">
            <button class="btn btn-danger w-100" type="button"
                    data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2"
                    aria-expanded="false" aria-controls="multiCollapseExample2">
            Eliminar
            </button>
        </div>
        
        <!-- Botón Modificar -->
        <div class="col mb-1">
            <button class="btn btn-warning w-100" type="button"
                    data-bs-toggle="collapse" data-bs-target="#multiCollapseExample4"
                    aria-expanded="false" aria-controls="multiCollapseExample4">
            Modificar
            </button>
        </div>
        
        <!-- Botón Buscar -->
        <div class="col mb-1">
            <button class="btn btn-secondary w-100" type="button"
                    data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3"
                    aria-expanded="false" aria-controls="multiCollapseExample3">
            Buscar
            </button>
        </div>
        
        <!-- Botón Mostrar -->
        <div class="col mb-1">
            <button class="btn btn-primary w-100" type="button"
                    data-bs-toggle="collapse" data-bs-target="#multiCollapseExample5"
                    aria-expanded="false" aria-controls="multiCollapseExample5">
            Mostrar
            </button>
        </div>
    </div>

    

    <!-- RELLENO DE LOS MENUS -->
    <div class="row justify-content-center g-3" id="accordionExample">
        <!--elemento -->
        <div class="col-md-8">
            <div class="collapse multi-collapse" id="multiCollapseExample1" data-bs-parent="#accordionExample">
                <div class="card card-body align-items-center">
                    <form action="./registro.php" method="post" class="newForm">
                        <h3 class="titulo text-success text-center mb-3">NUEVO USUARIO</h3>

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
                            <input type="submit" class="form-control btn btn-success" id="registro" name="registro" value="Dar de Alta">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!--elemento -->
        <div class="col-md-8">
            <div class="collapse multi-collapse" id="multiCollapseExample2" data-bs-parent="#accordionExample">
                <div class="card card-body align-items-center">
                   DOS This panel is hidden by default but revealed when the user activates the relevant trigger.
                </div>
            </div>
        </div>
        
        <!--elemento -->
        <div class="col-md-8">
            <div class="collapse multi-collapse" id="multiCollapseExample3" data-bs-parent="#accordionExample">
                <div class="card card-body align-items-center">
                    TRES.
                </div>
            </div>
        </div>
        
        <!--elemento -->
        <div class="col-md-8">
            <div class="collapse multi-collapse" id="multiCollapseExample4" data-bs-parent="#accordionExample">
                <div class="card card-body align-items-center">
                    CUATRO.
                </div>
            </div>
        </div>
        
        <!--elemento -->
        <div class="col-md-8">
            <div class="collapse multi-collapse" id="multiCollapseExample5" data-bs-parent="#accordionExample">
                <div class="card card-body align-items-center">
                    CINCO activates the relevant trigger.
                </div>
            </div>
        </div>
    </div>

                </main>
    <footer></footer>
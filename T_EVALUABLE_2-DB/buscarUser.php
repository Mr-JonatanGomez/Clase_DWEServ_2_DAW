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

if (isset($_POST["buscar"])){
    include "./includes/conexion.php";
    $userId= trim(strip_tags($_POST["idUser"]));
    comprobarUser($userId);

    if (comprobarUser($userId)) {

        $query="SELECT id_usuario, nombre, correo, tipo_usuario FROM usuarios WHERE id_usuario = $userId ";
        $resultadoBusq= mysqli_query($conexion,$query);
        if (mysqli_num_rows($resultadoBusq)>0) {
            
            $dato= mysqli_fetch_assoc($resultadoBusq);


                        // Si el usuario existe, preparamos el formulario de modificación
                    $form_o_error = '
                    <form action="" method="post" class="modForm">
                        <h3 class="titulo text-warning text-center mb-3">EDITAR DATOS</h3>
                    
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-3 col-form-label">Id_user</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="idUser" value="'.$dato['id_usuario'].'" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="'.$dato['nombre'].'">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="email" name="email" value="'.$dato['correo'].'">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Tipo actual</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" id="tipo" value="'.$dato['tipo_usuario'].'" readonly>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="tipo" class="col-sm-4 col-form-label">Tipo nuevo</label>
                            <div class="col-sm-8 d-flex align-items-center justify-content-around">
                                <label for="comprador">comprador  <input type="radio" id="comprador" name="tipo" value="comprador"></label>
                                <label for="vendedor">vendedor  <input type="radio" id="vendedor" name="tipo" value="vendedor"></label>
                            </div>
                        </div>
                        <div class="mt-4 row justify-content-center">
                            
                            <div class="col-sm-6 col-md-8 d-flex justify-content-center">
                            <input type="submit" class="form-control btn btn-warning" id="update" name="update" value="Modificar usuario">
                            </div>
                        </div>
                        
                    </form>';
        }
        


        
    } else {
        // Si no existe, asignamos un mensaje de error
        $form_o_error = '<div class="alert alert-danger text-center">El usuario no existe</div>';
    }

    mysqli_close($conexion);
}


if (isset($_POST["update"])){
    
}




/* FUNCIONES */


function comprobarUser($id_user_desde_form){
    # si existe, pasamos user_boolean a true;
    
    include './includes/conexion.php';
    $query= "SELECT * FROM usuarios WHERE id_usuario = $id_user_desde_form";
    $resultado=mysqli_query($conexion,$query);
    $existe=  (mysqli_num_rows($resultado)>0);

    mysqli_close($conexion);
    return $existe;
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
                        <a class="nav-link" href="./adminUser.php">VOLVER</a>
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
                    MODIFICACION USUARIO
                </h3>
            </div>
        </div>


        

        <!-- RELLENO DE LOS MENUS -->
        

            
            <!-- UPDATE USER -->

            <div class="col-md-8">
                
                    <div class="card card-body align-items-center">
<?php 
            
                        echo $form_o_error; 
?>
                    </div>
                
            </div>
        


    </main>
    
    <footer></footer>

</body>
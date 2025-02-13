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

if(isset($_REQUEST["registro"])){
    include './includes/conexion.php';
    
    if($conexion) {
        
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
        
            $query= "   INSERT INTO usuarios 
                                (nombre, correo, password, tipo_usuario)
                        VALUES ('$nombre','$email','$password','$tipo');
                    ";
            if (mysqli_query($conexion,$query)) {
                echo '<div class="alertas d-flex justify-content-center">
                                <div class="alert alert-success w-50 text-center d-flex justify-content-around" role="alert">
                                    <b>REGISTRO EXITOSO EN LA DATABASE</b>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                </div>
                            </div>';
    
                         
            } else{
                echo "Error al realizar el insert con la query:". $query. mysqli_error($conexion);
    
            }


        }


    }

    



}

if (isset($_REQUEST["delete"])) {
    include './includes/conexion.php';
    if ($conexion) {
    
        
        $id_user= mysqli_real_escape_string($conexion,$_REQUEST["id_usuario"]);
        $nombreUser= mysqli_real_escape_string($conexion,$_REQUEST["nombreUsuario"]);
    }
    mysqli_close($conexion);
    deleteUser($id_user,$nombreUser);


}






/* FUNCIONES */


function comprobarUser($id_user_desde_form,$nombreUs){
    # si existe, pasamos user_boolean a true;
    
    include './includes/conexion.php';
    $query= "SELECT * FROM usuarios WHERE id_usuario = $id_user_desde_form AND nombre = '$nombreUs'";
    $resultado=mysqli_query($conexion,$query);
    $existe=  (mysqli_num_rows($resultado)>0);

    mysqli_close($conexion);
    return $existe;
}
function deleteUser($id_user_desde_form, $nombre_user_form){
    $user_existe=false;
    if (!comprobarUser($id_user_desde_form,$nombre_user_form)) {
        echo'<div class="alertas d-flex justify-content-center">
                    <div class="alert alert-danger w-50 text-center d-flex justify-content-around" role="alert">
                        <b>EL USUARIO NO EXISTE, O NO COINCIDE ID y NOMBRE</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                   
                </div>';
    }else{
        include './includes/conexion.php';
            $query=" DELETE 
            FROM usuarios 
            WHERE id_usuario = $id_user_desde_form AND nombre = '$nombre_user_form';
                    ";
        
    
        if (mysqli_query($conexion, $query)) {
            echo'<div class="alertas d-flex justify-content-center">
                        <div class="alert alert-success w-50 text-center d-flex justify-content-around" role="alert">
                            <b>EL USUARIO con ID = '.  $id_user_desde_form .'<br> y NOMBRE = '.$nombre_user_form.' HA SIDO ELIMINADO CON EXITO</b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                       
                    </div>';
        }else {
            echo '<div class="alertas d-flex justify-content-center">
                    <div class="alert alert-danger w-50 text-center d-flex justify-content-around" role="alert">
                        <b>Error al eliminar el usuario.</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>';
        }
    
    
        
        mysqli_close($conexion);
    }
    
    
    
}
function mostrar(){
    
    include './includes/conexion.php';
    echo'
    <table class="table">
    <thead>
    <tr>
        <th class="d-none d-md-table-cell scope="col">id</th>
        <th scope="col">Nombre</th>
        <th scope="col" class="d-none d-md-table-cell">Email</th>
        <th>Tipo de Usuario</th>
        <th scope="col">Nº de Pisos en propiedad</th>
        
    </tr>
    </thead>
    <tbody>
    ';
    $query="SELECT id_usuario, nombre, correo, tipo_usuario, 
    COUNT(pisos.id_usuario) AS nPisos
    FROM usuarios
    LEFT JOIN pisos USING(id_usuario)
    GROUP BY id_usuario, nombre, correo, tipo_usuario
    ";
    $resultadoQuery= mysqli_query($conexion, $query);
    if (mysqli_num_rows($resultadoQuery)>0) {
    while ($row=mysqli_fetch_assoc($resultadoQuery)) {
        #obtenemos var y pintamos cada fila por su row[campo]
        echo'
        <tr>
        <th class="d-none d-md-table-cell scope="row">'.$row['id_usuario'].'</th>';
        echo'<td>'.$row['nombre'].'</td>';
        echo'<td class="d-none d-md-table-cell">'.$row['correo'].'</td>';
        
        echo '<td>'.$row['tipo_usuario'].'</td>';
        echo'<td>'.$row['nPisos'].'</td>';
        
    }
    }
    echo '</tbody></table>';


   
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

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5 row-cols-lg-5 mt-2 p-2 justify-content-center">
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
                        data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3"
                        aria-expanded="false" aria-controls="multiCollapseExample3">
                Modificar
                </button>
            </div>
            
            <!-- Botón Buscar -->
         <!--    <div class="col mb-1">
                <button class="btn btn-secondary w-100" type="button"
                        data-bs-toggle="collapse" data-bs-target="#multiCollapseExample4"
                        aria-expanded="false" aria-controls="multiCollapseExample4">
                Filtrar
                </button>
            </div> -->
            
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
            <!--NUEVO USER -->
            <div class="col-md-8">
                <div class="collapse multi-collapse" id="multiCollapseExample1" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
                        <form action="#" method="post" class="newForm">
                            <h2 class="titulo text-success text-center mb-3">NUEVO USUARIO</h2>

                            <div class="mb-3 row">
                                <label for="nombre" class="col-sm-3 col-form-label">Nombre</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" name="email" required>
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

            <!--DELETE USER -->
            <div class="col-md-8">
                <div class="collapse multi-collapse" id="multiCollapseExample2" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
                    <form class="deleteForm" action="#" method="post">
        
                        <h2 class="titulo text-danger text-center mb-3">ELIMINAR USUARIO</h2>
                        <p class="text-danger">Por seguridad, para eliminar un usuario, hay que introducir id_usuario y nombre, esta acción no tiene vuelta atras*</p>
                        <p class="text-secondary">*Tambien seran eliminados todos sus pisos</p>
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-3 col-form-label">Id de Usuario</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="id_usuario" name="id_usuario" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nombreUsuario" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" required>
                            </div>
                        </div>

                        
                        
                        <div class="mt-4 row justify-content-center">
                            
                            <div class="col-sm-6 col-md-8 d-flex justify-content-center">
                            <input type="submit" class="form-control btn btn-danger" id="delete" name="delete" value="Eliminar usuario">
                            </div>
                        </div>


                    </form>
                        
                    </div>
                </div>
            </div>
            
            <!-- UPDATE USER -->

            <div class="col-md-8">
                <div class="collapse multi-collapse" id="multiCollapseExample3" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
                        <form action="buscarUser.php" method="post" class="modForm">
                            <h2 class="titulo text-warning text-center mb-3">MODIFICAR USUARIO</h2>
                            <div class="mb-3 row">
                                <label for="idUser" class="col-sm-3 col-form-label">Id de Usuario</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="idUser" name="idUser">
                                </div>
                            </div>
                            <div class="mt-4 row justify-content-center">
                                
                                <div class="col-sm-6 col-md-8 d-flex justify-content-center">
                                <input type="submit" class="form-control btn btn-warning" id="buscar" name="buscar" value="Buscar">
                                </div>
                            </div>

                            
                        </form>
                    </div>
                </div>
            </div>
            
            <!--FILTRAR USER -->
           <!--  <div class="col-md-8">
                <div class="collapse multi-collapse" id="multiCollapseExample4" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
                        CUATRO.
                    </div>
                </div>
            </div> -->
            
            <!--elemento -->
            <div class="col-md-8">
                <div class="collapse multi-collapse" id="multiCollapseExample5" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
                        <?php
                        mostrar();
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </main>
    
    <footer></footer>

</body>
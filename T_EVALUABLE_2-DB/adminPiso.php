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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de pisos</title>
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
                <li class="nav-item p-3">
                    <a class="nav-link" href="./adminUser.php">ADMINISTRAR USUARIOS</a>
                </li>    
                        
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
    <main class="container-lg">
    <div class="row p-2">
        <div class="col-12 text-center">
            <h3 class="title primary">
                ADMINISTRACION DE PISOS
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
        <!--NUEVO USER -->
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
    
                    <h1 class="titulo text-danger text-center mb-3">ELIMINAR PISO</h1>
                    <p class="text-danger">Por seguridad, para eliminar un usuario, hay que introducir id_usuario y nombre, esta acción no tiene vuelta atras</p>
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
        <div class="col-md-12">
            <div class="collapse multi-collapse" id="multiCollapseExample5" data-bs-parent="#accordionExample">
                <div class="card card-body align-items-center">
                    <?php
                        $conexion = mysqli_connect("Localhost", "root", "", "inmobiliaria_jonatangomez");
                        
                        if (!$conexion) {
                        die("ERROR DE CONEXION". mysqli_connect_error());
                        }
                        echo'
                        <table class="table">
                        <thead>
                        <tr>
                            <th class="d-none d-md-table-cell scope="col">id</th>
                            <th scope="col">Poblacion</th>
                            <th scope="col">m²</th>
                            <th scope="col">Precio</th>
                            <th scope="col" class="d-none d-md-table-cell">Direccion</th>
                            <th scope="col">Dueño</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody>
                        ';
                        $query="SELECT id_piso, poblacion, metros, precio, calle, numero, piso, puerta, usuarios.nombre AS dueño
                        FROM pisos
                        LEFT JOIN usuarios USING(id_usuario)
                        GROUP BY id_piso, poblacion, metros, precio, calle, numero, piso, puerta, dueño
                        ";
                        $resultadoQuery= mysqli_query($conexion, $query);
                        if (mysqli_num_rows($resultadoQuery)>0) {
                        while ($row=mysqli_fetch_assoc($resultadoQuery)) {
                            #obtenemos var y pintamos cada fila por su row[campo]
                            echo'
                            <tr>
                            <th class="d-none d-md-table-cell scope="row">'.$row['id_piso'].'</th>';
                            echo'<td>'.$row['poblacion'].'</td>';
                            echo'<td>'.$row['metros'].'</td>';
                            echo'<td>'.$row['precio'].'</td>';
                            echo '<td class="d-none d-md-table-cell">Calle '.$row['calle'].
                                ' Nº '.$row['numero'].
                                ' Piso '.$row['piso'].'º'.
                                $row['puerta'].'</td>';
                            echo'<td>'.$row['dueño'].'</td>';
                            
                        }
                        }
                        echo '</tbody></table>';



                    ?>
                </div>
            </div>
        </div>
    </div>

                </main>
    <footer></footer>

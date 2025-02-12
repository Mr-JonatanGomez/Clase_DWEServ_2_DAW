<?php


session_start();
$form_o_error ='<div class="mt-3 row">
                    <div class="col-12">
                        <a class="form-control btn btn-danger" href="./adminPiso.php">VOLVER</a>
                    </div>
                </div>';

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


function comprobarPiso($id_piso_from_form){
    # si existe, pasamos user_boolean a true;
    
    include './includes/conexion.php';
    $query= "SELECT * FROM pisos WHERE id_piso = $id_piso_from_form";
    $resultado=mysqli_query($conexion,$query);
    $existePiso=  (mysqli_num_rows($resultado)>0);

    mysqli_close($conexion);
    return $existePiso;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion de Pisos</title>
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
                    MODIFICACION PISO
                </h3>
                
            </div>
        </div>


        

        <!-- RELLENO DE LOS MENUS -->
        

            
            <!-- UPDATE USER -->
            <div class="row justify-content-center g-3" id="accordionExample">
                <div class="col-md-8">
                
                    <div class="card card-body align-items-center">
                         <div class="col-md-12">
                <div class="collapse multi-collapse" id="multiCollapseExample4" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
                        <?php

                            $filtrado =mysqli_real_escape_string($conexion,trim(strip_tags($_REQUEST["filtroP"])));
                            include './includes/conexion.php';
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
                            WHERE poblacion LIKE '%$filtrado%'
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
                            }else{
                                echo '<div class="alertas d-flex justify-content-center">
                    <div class="alert alert-danger w-50 text-center d-flex justify-content-around" role="alert">
                        <b>NINGUN PISO REUNE LAS CONDICIONES.</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>';
                            }
                            echo '</tbody></table>';



                        ?>
                    </div>
                </div>
            </div>
                    </div>
                </div>
                
            </div>
        


    </main>
    
    <footer></footer>

</body>
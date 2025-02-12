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

if (isset($_POST["buscar"])){
    include "./includes/conexion.php";
    $pisoId= trim(strip_tags($_POST["pisoId"]));
    comprobarPiso($pisoId);

    if (comprobarPiso($pisoId)) {

        $query="SELECT id_piso, calle, numero, piso, puerta, metros, poblacion, precio, id_usuario FROM pisos WHERE id_piso = $pisoId ";
        $resultadoBusq= mysqli_query($conexion,$query);
        if (mysqli_num_rows($resultadoBusq)>0) {
            
            $dato= mysqli_fetch_assoc($resultadoBusq);


                        // Si el usuario existe, preparamos el formulario de modificación
                    $form_o_error = '
                    <form action="" method="post" class="modForm">
                        <h3 class="titulo text-warning text-center mb-3">EDITAR DATOS</h3>
                    
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-3 col-form-label">Id_piso</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pisoIdM" name="pisoIdM" value="'.$dato['id_piso'].'" readonly>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-3 col-form-label">Calle</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="calle" name="calle" value="'.$dato['calle'].'" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Numero</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="numero" name="numero" value="'.$dato['numero'].'" required>
                            </div>
                        </div>

                        
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Piso</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="piso" name="piso" value="'.$dato['piso'].'" required>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Puerta</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="puerta" name="puerta" value="'.$dato['puerta'].'" required>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Metros²</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="metros" name="metros" value="'.$dato['metros'].'" required>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Poblacion</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="poblacion" name="poblacion" value="'.$dato['poblacion'].'" required>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Precio</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="precio" name="precio" value="'.$dato['precio'].'" required>
                            </div>
                        </div>
                        
                        <div class="mb-3 row">
                            <label for="nombre" class="col-sm-3 col-form-label">Id propietario</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="userIdM" name="userIdM" value="'.$dato['id_usuario'].'" readonly>
                            </div>
                        </div>
                        
                        
                        
                        <div class="mt-4 row justify-content-center">
                            
                            <div class="col-sm-6 col-md-8 d-flex justify-content-center">
                            <input type="submit" class="form-control btn btn-warning" id="update" name="update" value="Modificar piso">
                            </div>
                        </div>
                        
                    </form>';
        }
        


        
    } else {
        // Si no existe, asignamos un mensaje de error
        $form_o_error = '
        <form class="modForm">
        <h3 class="titulo text-warning text-center mb-3">EDITAR DATOS</h3>
            <div class="mb-3 row">
                <div class="col-12">
                    <div class="alertas d-flex justify-content-center">
                        <div class="alert alert-danger w-50 text-center d-flex justify-content-around" role="alert">
                            <b>EL PISO INTRODUCIDO NO EXISTE</b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <div class="col-12">
                    <div class="alertas d-flex justify-content-center">
                        <div class="alert alert-warning w-50 text-center d-flex justify-content-around" role="alert">
                            <a class="form-control btn btn-danger" href="./adminPiso.php">VOLVER</a>
                        </div>
                    </div>
                </div>
            </div>
    </form>
                    ';
    }

    mysqli_close($conexion);
}


if (isset($_POST["update"])){
    include "./includes/conexion.php";

    $id_piso   = mysqli_real_escape_string($conexion, $_REQUEST["pisoIdM"]);
    $calle     = mysqli_real_escape_string($conexion, trim(strip_tags($_POST["calle"])));
    $numero    = mysqli_real_escape_string($conexion, trim(strip_tags($_POST["numero"])));
    $piso      = mysqli_real_escape_string($conexion, trim(strip_tags($_POST["piso"])));
    $puerta    = mysqli_real_escape_string($conexion, trim(strip_tags($_POST["puerta"])));
    $metros    = mysqli_real_escape_string($conexion, trim(strip_tags($_POST["metros"])));
    $poblacion = mysqli_real_escape_string($conexion, trim(strip_tags($_POST["poblacion"])));
    $precio    = mysqli_real_escape_string($conexion, trim(strip_tags($_POST["precio"])));
    $userIdM   = mysqli_real_escape_string($conexion, $_REQUEST["userIdM"]);

    $query = "UPDATE pisos 
                SET calle     = '$calle',
                numero    = $numero,
                piso      = $piso,
                puerta    = '$puerta',
                metros    = $metros,
                poblacion = '$poblacion',
                precio    = $precio,
                id_usuario = $userIdM
            WHERE id_piso = $id_piso;";

    if (mysqli_query($conexion,$query)) {
        echo '<div class="alertas d-flex justify-content-center">
                                <div class="alert alert-success w-50 text-center d-flex justify-content-around" role="alert">
                                    <b>MODIFICACION EXITOSA EN LA DATABASE</b>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                </div>
                            </div>';
    }else{
        echo "Error al realizar el insert con la query:". $query. mysqli_error($conexion);
    }


    mysqli_close($conexion);
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
<?php 
            
                        echo $form_o_error; 
?>
                    </div>
                </div>
                
            </div>
        


    </main>
    
    <footer></footer>

</body>
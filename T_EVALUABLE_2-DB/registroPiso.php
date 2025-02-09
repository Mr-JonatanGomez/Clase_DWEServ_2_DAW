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


if(isset($_REQUEST["registroP"])){
    $conexion = mysqli_connect("localhost","root","", "inmobiliaria_jonatangomez");
    if (!$conexion) {
        die("ERROR DE CONEXION". mysqli_connect_error());
    }else {
            $calle = mysqli_real_escape_string($conexion,$_REQUEST["calle"]);
            $numero = mysqli_real_escape_string($conexion,$_REQUEST["numero"]);
            $piso = mysqli_real_escape_string($conexion,$_REQUEST["piso"]);
            $puerta = mysqli_real_escape_string($conexion,$_REQUEST["puerta"]);
            $metros = mysqli_real_escape_string($conexion,$_REQUEST["metros"]);
            $poblacion = mysqli_real_escape_string($conexion,$_REQUEST["poblacion"]);
            $precio = mysqli_real_escape_string($conexion,$_REQUEST["precio"]);
            $idUser= $_SESSION["id_usuario"];

            $query= "   INSERT INTO pisos 
                                (calle, numero, piso, puerta, metros, poblacion, precio, id_usuario)
                        VALUES ('$calle',$numero,$piso,'$puerta',$metros,'$poblacion',$precio,$idUser);
                    ";
            if (mysqli_query($conexion,$query)) {
                echo '<div class="alertas d-flex justify-content-center">
                                <div class="alert alert-success w-50 text-center d-flex justify-content-around" role="alert">
                                    <b>HAS REGISTRADO UN PISO EN NUESTRA DATABASE</b>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                                </div>
                            </div>';
    

            } else{
                echo "Error al realizar el insert con la query:". $query. mysqli_error($conexion);
            }

    }

    



}
    



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro piso</title>
    <?php include './includes/head-libraries.php'; ?>
</head>
<body>


    <!-- 

    AL REGISTRO, HAY QUE COMPROBAR SI EL CORREO EXISTE EN DATABASE, 
    DE SER ASI,LANZAR AVISO, YA ESTAS REGISTRADO.

    SI NO PUES HACER LOS INSERT EN LA DATABASE


    TAREAS NECESARIAS :
    1-FORM CON NOMBRE; CORREO, PASS, TIPO, COMPRADOR, VENDEDOR (RADIO)
    2-GUARDAR EN VARIABLES, y HACER INSERT
    3-CONFIRMACION, INICIA ssession_start(), y MENU CORRESPONDIENTE AL TIPO

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

    <form class="standarForm" action="" method="post">
    
        <h1 class="titulo text-success text-center mb-3">REGISTRO</h1>
        <div class="mb-3 row">
            <label for="calle" class="col-sm-3 col-form-label">Calle</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="calle" name="calle" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="numero" class="col-sm-3 col-form-label">Numero</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="numero" name="numero" required>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="piso" class="col-sm-3 col-form-label">Piso</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="piso" name="piso" required>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="puerta" class="col-sm-3 col-form-label">Puerta</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="puerta" name="puerta" required>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="metros" class="col-sm-3 col-form-label">metros²</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="metros" name="metros" required>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="poblacion" class="col-sm-3 col-form-label">Población</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="poblacion" name="poblacion" required>
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="precio" class="col-sm-3 col-form-label">Precio</label>
            <div class="col-sm-8">
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>
        </div>
        
        
        
        
        <div class="mt-4 row justify-content-center">
            
            <div class="col-sm-6 col-md-8 d-flex justify-content-center">
            <input type="submit" class="form-control btn btn-primary" id="registroP" name="registroP" value="Registrar piso">
            </div>
        </div>
    
    
    </form>
</main>

<footer></footer>
</body>
</html>
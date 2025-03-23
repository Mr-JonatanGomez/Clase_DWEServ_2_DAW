<?php
session_start();
include './includes/conexion.php';




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
pass

if(isset($_REQUEST["registroP"])){

    include './includes/conexion.php';
    
    
            $calle = mysqli_real_escape_string($conexion,$_REQUEST["calle"]);
            $numero = mysqli_real_escape_string($conexion,$_REQUEST["numero"]);
            $piso = mysqli_real_escape_string($conexion,$_REQUEST["piso"]);
            $puerta = mysqli_real_escape_string($conexion,$_REQUEST["puerta"]);
            $metros = mysqli_real_escape_string($conexion,$_REQUEST["metros"]);
            $poblacion = mysqli_real_escape_string($conexion,$_REQUEST["poblacion"]);
            $precio = mysqli_real_escape_string($conexion,$_REQUEST["precio"]);
            
            $idUser = mysqli_real_escape_string($conexion,$_REQUEST["idUser"]);
                
            
            
            if(comprobarUser($idUser)){

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
            }else{
                echo '<div class="alertas d-flex justify-content-center">
                <div class="alert alert-error w-50 text-center d-flex justify-content-around" role="alert">
                    <b>EL USUARIO NO EXISTE Y NO PUEDES AGREGAR UN PISO A ESTE USER</b>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            </div>';

            }


    

    



}

if (isset($_REQUEST["delete"])) {
    include './includes/conexion.php';
    if ($conexion) {
    
        
        $id_piso= mysqli_real_escape_string($conexion,$_REQUEST["id_pisoDel"]);
        $id_user= mysqli_real_escape_string($conexion,$_REQUEST["id_usuarioDel"]);
    }
    mysqli_close($conexion);
    deletePiso($id_piso,$id_user);


}
/* FUNCIONES */

function deletePiso($id_pisoDel,$idPropietarioDel){
    
    if (!comprobarUser($idPropietarioDel) && !comprobarPiso($id_pisoDel)) {
        echo'<div class="alertas d-flex justify-content-center">
                    <div class="alert alert-danger w-50 text-center d-flex justify-content-around" role="alert">
                        <b>EL PISO y el PROPIETARIO NO EXISTEN</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                   
                </div>';
    }elseif (!comprobarUser($idPropietarioDel)) { 
        echo'<div class="alertas d-flex justify-content-center">
                    <div class="alert alert-danger w-50 text-center d-flex justify-content-around" role="alert">
                        <b>EL PROPIETARIO NO EXISTEN</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                   
                </div>';
    }elseif (!comprobarPiso($id_pisoDel)) { 
        echo'<div class="alertas d-flex justify-content-center">
                    <div class="alert alert-danger w-50 text-center d-flex justify-content-around" role="alert">
                        <b>EL PISO NO EXISTE</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                   
                </div>';
    }else{
        include './includes/conexion.php';
            $query=" DELETE 
            FROM pisos 
            WHERE id_piso = $id_pisoDel AND id_usuario = '$idPropietarioDel';
                    ";
        
    
        if (mysqli_query($conexion, $query)) {
            echo'<div class="alertas d-flex justify-content-center">
                        <div class="alert alert-success w-50 text-center d-flex justify-content-around" role="alert">
                            <b>EL Piso con ID = '.  $id_pisoDel .', HA SIDO ELIMINADO CON EXITO</b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                       
                    </div>';
        }else {
            echo '<div class="alertas d-flex justify-content-center">
                    <div class="alert alert-danger w-50 text-center d-flex justify-content-around" role="alert">
                        <b>Error al eliminar el PISO.</b>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                  </div>';
        }
    
    
        
        mysqli_close($conexion);
    }
    
    
    
}

function comprobarUser($id_user_desde_form){
    # si existe, pasamos user_boolean a true;
    
    include './includes/conexion.php';
    $query= "SELECT * FROM usuarios WHERE id_usuario = $id_user_desde_form";
    $resultado=mysqli_query($conexion,$query);
    $existe=  (mysqli_num_rows($resultado)>0);

    mysqli_close($conexion);
    return $existe;
} 

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
                        data-bs-toggle="collapse" data-bs-target="#multiCollapseExample3"
                        aria-expanded="false" aria-controls="multiCollapseExample3">
                Modificar
                </button>
            </div>
            
            <!-- Botón Buscar -->
            <div class="col mb-1">
                <button class="btn btn-secondary w-100" type="button"
                        data-bs-toggle="collapse" data-bs-target="#multiCollapseFiltrar"
                        aria-expanded="false" aria-controls="multiCollapseFiltrar">
                Filtrar
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
            <!--NUEVO PISO -->
            <div class="col-md-8">
                <div class="collapse multi-collapse" id="multiCollapseExample1" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
                        <form action="#" method="post" class="newForm">
                            <h3 class="titulo text-success text-center mb-3">NUEVO PISO</h3>

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
                            
                            <div class="mb-3 row">
                                <label for="idUser" class="col-sm-3 col-form-label">Id_usuario</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="idUser" name="idUser" required>
                                </div>
                            </div>
            
                            <div class="mt-4 row justify-content-center">
                                
                                <div class="col-sm-6 col-md-8 d-flex justify-content-center">
                                <input type="submit" class="form-control btn btn-success" id="registroP" name="registroP" value="Dar de Alta">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!--DELETE PISO -->
            <div class="col-md-8">
                <div class="collapse multi-collapse" id="multiCollapseExample2" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
                    <form class="deleteForm" action="#" method="post">
        
                        <h1 class="titulo text-danger text-center mb-3">ELIMINAR PISO</h1>
                        <p class="text-danger">Por seguridad, para eliminar un piso, hay que introducir id_piso e Id_propietario, esta acción no tiene vuelta atras</p>
                        <div class="mb-3 row">
                            <label for="id_pisoDel" class="col-sm-3 col-form-label">Id de Piso</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="id_pisoDel" name="id_pisoDel" required>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="id_usuarioDel" class="col-sm-3 col-form-label">Id de Propietario</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="id_usuarioDel" name="id_usuarioDel" required>
                            </div>
                        </div>

                        
                        
                        <div class="mt-4 row justify-content-center">
                            
                            <div class="col-sm-6 col-md-8 d-flex justify-content-center">
                            <input type="submit" class="form-control btn btn-danger" id="delete" name="delete" value="Eliminar Piso">
                            </div>
                        </div>


                    </form>
                        
                    </div>
                </div>
            </div>
            
            <!--UPDATE PISO -->
            <div class="col-md-8">
                <div class="collapse multi-collapse" id="multiCollapseExample3" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
                        <form action="buscarPiso.php" method="post" class="modForm">
                            <h2 class="titulo text-warning text-center mb-3">MODIFICAR PISO</h2>
                            <div class="mb-3 row">
                                <label for="pisoId" class="col-sm-3 col-form-label">Id del piso</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="pisoId" name="pisoId">
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
            
            <!--FILTRAR-->
<?php

            $mostrarResultados = false;
            $resultadosHTML = ''; // Variable para guardar la tabla de resultados filtrados

            if (isset($_REQUEST["filtrarIni"])) {
                // Se envió el formulario de filtrado
                $filtrado = mysqli_real_escape_string($conexion, trim(strip_tags($_REQUEST["filtroP"])));
                
                // Construimos la tabla de resultados
                $resultadosHTML .= '
                <table class="table">
                    <thead>
                        <tr>
                            <th class="d-none d-md-table-cell" scope="col">id</th>
                            <th scope="col">Poblacion</th>
                            <th scope="col">m²</th>
                            <th scope="col">Precio</th>
                            <th class="d-none d-md-table-cell" scope="col">Direccion</th>
                            <th scope="col">Dueño</th>
                        </tr>
                    </thead>
                    <tbody>';
                
                $query = "SELECT id_piso, poblacion, metros, precio, calle, numero, piso, puerta, usuarios.nombre AS dueño
                        FROM pisos
                        LEFT JOIN usuarios USING(id_usuario)
                        WHERE poblacion LIKE '%$filtrado%'
                        GROUP BY id_piso, poblacion, metros, precio, calle, numero, piso, puerta, dueño";

                $resultadoQuery = mysqli_query($conexion, $query);
                if (mysqli_num_rows($resultadoQuery) > 0) {
                    while ($row = mysqli_fetch_assoc($resultadoQuery)) {
                        $resultadosHTML .= '
                        <tr>
                            <th class="d-none d-md-table-cell" scope="row">'.$row['id_piso'].'</th>
                            <td>'.$row['poblacion'].'</td>
                            <td>'.$row['metros'].'</td>
                            <td>'.$row['precio'].'</td>
                            <td class="d-none d-md-table-cell">Calle '.$row['calle'].' Nº '.$row['numero'].' Piso '.$row['piso'].'º '.$row['puerta'].'</td>
                            <td>'.$row['dueño'].'</td>
                        </tr>';
                    }
                } else {
                    $resultadosHTML .= '
                    <tr>
                        <td colspan="6">
                            <div class="alert alert-danger text-center" role="alert">
                                <b>NINGUN PISO REÚNE LAS CONDICIONES.</b>
                            </div>
                        </td>
                    </tr>';
                }
                $resultadosHTML .= '</tbody></table>';
                
                // Indicamos que se mostrarán los resultados
                $mostrarResultados = true;
            }
            ?>
            <!-- Contenedor Collapse para Filtrar -->
            <div class="col-md-8">
                <!-- Usamos un ID único para esta sección, por ejemplo: multiCollapseFiltrar -->
                <div class="collapse multi-collapse 
<?php               
                echo ($mostrarResultados) ? 'show' : ''; 
?>
                    " id="multiCollapseFiltrar" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
        
<?php      
                    if ($mostrarResultados): 
?>
                            <!-- Mostrar resultados filtrados -->
                            <?php echo $resultadosHTML; ?>
                            <!-- Botón de reset para recargar la página (limpiar el filtro) -->
                            <button type="button" class="btn btn-secondary mt-3" onclick="window.location.href='adminPiso.php'">Resetear filtro</button>
                        <?php else: ?>
                            <!-- Mostrar formulario de filtrado -->
                            <form action="" method="post" class="searchForm">
                                <h2 class="titulo text-secondary text-center mb-3">FILTRAR POR POBLACION</h2>
                                <p class="text-secondary text-center">Puedes filtrar por población, no es necesario ingresar el nombre completo.</p>
                                <div class="mb-3 row">
                                    <label for="filtroP" class="col-sm-3 col-form-label">Poblacion</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="filtroP" name="filtroP">
                                    </div>
                                </div>
                                <div class="mt-4 row justify-content-center">
                                    <div class="col-sm-6 col-md-8 d-flex justify-content-center">
                                        <input type="submit" class="form-control btn btn-secondary" id="filtrarIni" name="filtrarIni" value="Filtrar">
                                    </div>
                                </div>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            
            
            <!--MOSTRAR -->
            <div class="col-md-12">
                <div class="collapse multi-collapse" id="multiCollapseExample5" data-bs-parent="#accordionExample">
                    <div class="card card-body align-items-center">
                        <?php
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
                            
                            
                    mysqli_close($conexion);


                        ?>
                        
                    </div>
                </div>
            </div>
        

    </main>

    <footer></footer>

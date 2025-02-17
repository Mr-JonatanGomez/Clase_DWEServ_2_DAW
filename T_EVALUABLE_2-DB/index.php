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


if (isset($_REQUEST["comprar"])){
  include "./includes/conexion.php";

  $pisoParaCompra = mysqli_real_escape_string($conexion, $_REQUEST["id_pisoBuy"]); 
  $propietarioActual = mysqli_real_escape_string($conexion, $_REQUEST["id_propietario"]); 
  $precio = mysqli_real_escape_string($conexion, $_REQUEST["precioVenta"]); 
  $comprador= $_SESSION["id_usuario"];

  /* echo"id Piso". $pisoParaCompra ."<br>";
  echo"id Propiet". $propietario; */
  $query="INSERT INTO ventas (usuario_comprador, id_piso, precio_final, usuario_vendedor)
          VALUES($comprador, $pisoParaCompra,$precio,$propietarioActual);
  ";

  $queryActu= "UPDATE pisos 
              SET id_usuario = $comprador
              WHERE id_piso = $pisoParaCompra;";


  

  if (mysqli_query($conexion,$query) && mysqli_query($conexion, $queryActu)) {
    echo'<div class="alertas d-flex justify-content-center">
                        <div class="alert alert-success w-50 text-center d-flex justify-content-around" role="alert">
                            <b>El piso ha sido comprado con exito</b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                       
                    </div>';

  }else{
    echo'<div class="alertas d-flex justify-content-center">
                        <div class="alert alert-danger w-50 text-center d-flex justify-content-around" role="alert">
                            <b>Hubo un error y el piso no ha podido ser comprado</b>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                        </div>
                       
                    </div>';
  }



  mysqli_close($conexion);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inmobiliaria JGomez</title>
    <?php include './includes/head-libraries.php'; ?>

</head>
<body>
<header class="p-4">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Inmobiliaria JGomez</h1>
            </div>

        </div>

        <div class="row">

            <div class="navbar col-sm-8 justify-content-center justify-content-md-start">
                <ul class="nav justify-content-center justify-content-sm-start">
  <?php

              if (!isset($_SESSION["email"])&& !isset($_SESSION["tipo_usuario"])&& !isset($_SESSION["id_usuario"])) {
                echo'
                
                <li class="nav-item p-3">
                    <a class="nav-link"href="./login.php">INICIAR SESION</a>
                </li>
                
                <li class="nav-item p-3">
                    <a class="nav-link" href="./registro.php">REGISTRARSE</a>
                </li>
                ';
              }else{
                
              }

    if (isset($_SESSION["tipo_usuario"])&& $_SESSION["tipo_usuario"] =="vendedor") {
            
      echo'
                        <li class="nav-item p-3">
                            <a class="nav-link" href="./registroPiso.php">REGISTRAR PISO</a>
                        </li>
      ';
    }elseif (isset($_SESSION["tipo_usuario"])&& $_SESSION["tipo_usuario"] =="admin") {
      
      echo'
      <li class="nav-item p-3">
          <a class="nav-link" href="./adminUser.php">ADMINISTRAR USUARIOS</a>
      </li>
      <li class="nav-item p-3">
          <a class="nav-link" href="./adminPiso.php">ADMINISTRAR PISOS</a>
      </li>
    ';
    }





  ?>                        
                        
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
  <div class="row p-4 justify-content-around">
   <!--  <div class="col-8 mt-3 justify-content-center"> -->
  <?php
    /* pintaremos DINAMICAMENTE CADA PISO */
    include './includes/conexion.php';

    

    $query="SELECT id_piso, poblacion, metros, precio, calle, numero, piso, puerta, id_usuario FROM pisos";
    $resultadoQuery= mysqli_query($conexion, $query);

    
    if (mysqli_num_rows($resultadoQuery)>0) {
      while ($row=mysqli_fetch_assoc($resultadoQuery)) {
          #obtenemos var y pintamos cada fila por su row[campo]

        ?>
            <div class="col-12 col-sm-5 mb-5 miCard p-3">
            <div class="card border-0 text-center">
              <img src="./utils//img/Imagen principal.webp" class="card-img-top img-fluid w-75 mx-auto" alt="...">
              <div class="card-body">
                <h2 class="card-title"><?php echo $row['id_piso'].'. '.$row['poblacion'] ?></h2>
                <p class="card-text">Calle <?php echo $row['calle'].
                ' Nº '.$row['numero'].
                ', Piso '.$row['piso'].'º'.
                $row['puerta'] ?></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item li-m"><?php echo $row['metros']?> m²</li>
                <li class="list-group-item li-p"><strong> <?php echo $row['precio']?> €</strong></li>
                
              </ul>
              <div class="card-body">
                <?php
                  if (isset($_SESSION["tipo_usuario"])&& $_SESSION["tipo_usuario"] =="comprador") {
                    echo'
                    
                    <form action="" method="post">
                        <input type="hidden" name="id_pisoBuy" value="'.$row['id_piso'].'">
                        <input type="hidden" name="id_propietario" value="'.$row['id_usuario'].'">
                        <input type="hidden" name="precioVenta" value="'.$row['precio'].'">
                        <input type="submit" class="btn btn-success" name="comprar" id="comprar" value="BUY">
                    </form>
                    
                  ';
                  }
                
                ?>
              </div>  
            </div> 
            </div> 
          
  <?php

      }
    }

  ?>
    <!-- </div> -->
  </div>
</main>






    <footer class="p-4"></footer>


    <script src="./utils/js/sweet.js"></script>
</body>
</html>


<!-- <main class="container-lg CON CARRUSEL">
 
  <div id="carouselCards" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      APERTURA PHP
        include './includes/conexion.php';
        $query = "SELECT id_piso, poblacion, metros, precio, calle, numero, piso, puerta, id_usuario FROM pisos";
        $resultadoQuery = mysqli_query($conexion, $query);
        
        // Variable para marcar el primer slide como activo
        $active = 'active';

        if (mysqli_num_rows($resultadoQuery) > 0) {
          while ($row = mysqli_fetch_assoc($resultadoQuery)) {
            echo '<div class="carousel-item ' . $active . '">';
            // Solo el primer slide debe llevar la clase "active"
            $active = '';
            
            // Para centrar la card, le damos un ancho máximo y usamos mx-auto
            echo '<div class="card text-center mx-auto" style="max-width: 400px;">';
              echo '<img src="./utils/img/Imagen principal.webp" class="card-img-top img-fluid w-75 mx-auto p-2" alt="Imagen del piso">';
              echo '<div class="card-body">';
                echo '<h3 class="card-title">' . $row['id_piso'] . '. ' . $row['poblacion'] . '</h3>';
                echo '<p class="card-text">Calle ' . $row['calle'] . ' Nº ' . $row['numero'] . ' Piso ' . $row['piso'] . 'º ' . $row['puerta'] . '</p>';
              echo '</div>';
              echo '<ul class="list-group list-group-flush">';
                echo '<li class="list-group-item">' . $row['metros'] . ' m²</li>';
                echo '<li class="list-group-item"><strong>' . $row['precio'] . ' €</strong></li>';
              echo '</ul>';
              echo '<div class="card-body">';
                if (isset($_SESSION["tipo_usuario"]) && $_SESSION["tipo_usuario"] == "comprador") {
                  echo '<form action="" method="post">';
                    echo '<input type="hidden" name="id_pisoBuy" value="' . $row['id_piso'] . '">';
                    echo '<input type="hidden" name="id_propietario" value="' . $row['id_usuario'] . '">';
                    echo '<input type="hidden" name="precioVenta" value="' . $row['precio'] . '">';
                    echo '<input type="submit" class="btn btn-success" name="comprar" id="comprar" value="BUY">';
                  echo '</form>';
                }
              echo '</div>';
            echo '</div>'; // Fin de la card
            echo '</div>'; // Fin del carousel-item
          }
        }
        mysqli_close($conexion);
      AQUI CIERRE PHP
    </div>
   
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselCards" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselCards" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</main> -->



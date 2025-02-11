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
<?php
  /* pintaremos DINAMICAMENTE CADA PISO */
  include './includes/conexion.php';

  echo'
  <table class="table">
  <thead>
    <tr>
      <th class="d-none d-md-table-cell scope="col">id</th>
      <th scope="col">Poblacion</th>
      <th scope="col">metros²</th>
      <th scope="col">Precio</th>
      <th scope="col" class="d-none d-md-table-cell">Direccion</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  ';

  $query="SELECT id_piso, poblacion, metros, precio, calle, numero, piso, puerta FROM pisos";
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

      if (isset($_SESSION["tipo_usuario"])&& $_SESSION["tipo_usuario"] =="comprador") {
        
        echo'
        <td>
        <form action="" method="post">
            <input type="submit" class="btn btn-success" name="comprar" id="comprar" value="BUY">
        </form>
        </td>
        ';
      }
    }
  }


  echo '</tbody></table>';

  

?>

    </main>






    <footer class="p-4"></footer>


    <script src="./utils/js/sweet.js"></script>
</body>
</html>
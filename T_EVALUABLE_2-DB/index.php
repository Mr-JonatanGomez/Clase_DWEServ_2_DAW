<?php
session_start();
function sesionFn(){
  if (isset($_SESSION["email"])) {
    echo "user";
    echo '$_SESSION["email"]';
  }
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
        <!-- <div class="titulo d-flex flex-row justify-content-center">
        </div> -->

        <div class="row">

            <div class="navbar col-8">
                <ul class="nav justify-content-start">
                    <li class="nav-item p-3">
                        <a class="nav-link" href="#">VER PISOS</a>
                    </li>
                    <li class="nav-item p-3">
                        <a class="nav-link"href="./login.php">INICIAR SESION</a>
                    </li>
                    <li class="nav-item p-3">
                        <a class="nav-link" href="#">REGISTRARSE</a>
                    </li>
                        
                        
                </ul>
            </div>

            <div class="sesion col-4 d-flex flex-column align-items-end">
       
                    <h6 class="user-activo">
    <?php
                    if (isset($_SESSION["email"])) {
                    echo "usuario: ";
                    echo $_SESSION["email"];
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
  $conexion = mysqli_connect("Localhost", "root", "", "inmobiliaria_jonatangomez");
  
  if (!$conexion) {
    die("ERROR DE CONEXION". mysqli_connect_error());
  }

  echo'
  <table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Poblacion</th>
      <th scope="col">metros²</th>
      <th scope="col">Precio</th>
      <th scope="col">Direccion</th>
      <th scope="col"></th>
    </tr>
  </thead>
  ';
  
  echo '<tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    '; 

?>

    </main>






    <footer class="p-4"></footer>


    <script src="./utils/js/sweet.js"></script>
</body>
</html>
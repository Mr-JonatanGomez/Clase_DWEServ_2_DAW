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
         
      <div class="titulo d-flex flex-row justify-content-between">
          <div class="col-8">
            <h1>Inmobiliaria JGomez</h1>
          </div>
          <div class="col-4">

            <h4 class="user-activo">
<?php
             if (isset($_SESSION["email"])) {
              echo "user";
              echo '$_SESSION["email"]';
            }
?>
          </h4>
          </div>

        </div>

        <div class="navBar">
          <ul class="nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link" href="#">VER PISOS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./login.php">INICIAR SESION</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">REGISTRARSE</a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#">CERRAR SESION</a>
              </li> -->
              
            </ul>
        </div>
            
        
    </header>



    <main class="container-lg"></main>






    <footer class="p-4"></footer>


    <script src="./utils/js/sweet.js"></script>
</body>
</html>
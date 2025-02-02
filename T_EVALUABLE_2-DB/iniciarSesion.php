<?php

if (isset($_REQUEST["iniciar-sesion"])) {
    #antes de iniciar sesion, eliminamos posibles sesiones anteriores
    unset($_SESSION["email"]);
    unset($_SESSION["tipo_usuario"]);
    unset($_SESSION["id_usuario"]);
    session_destroy();



    $conexion = mysqli_connect("localhost","root","","inmobiliaria_jonatangomez");

    if (!$conexion) {
        die("Hubo un error de conexion. ".mysqli_connect_error());
    }

    $usuarioIntro=trim(strip_tags($_REQUEST["email"]));
    $passwordIntro=trim(strip_tags($_REQUEST["password"]));

    $query="SELECT correo, password, tipo_usuario FROM usuarios WHERE correo = '$usuarioIntro';";
    $resultadoQuery= mysqli_query($conexion,$query);


    if (mysqli_num_rows($resultadoQuery)>0) {
        $userEncontrado=true;
        ($row=mysqli_fetch_assoc($resultadoQuery));
            $tipoUserActual= $row["tipo_usuario"];

        if ($row['password'] == $passwordIntro) {
            

            echo mysqli_num_rows($resultadoQuery). "numeroFIlas";
          
            echo '<div class="d-flex justify-content-center">
                        <div class="alert alert-success w-50 text-center" role="alert">
                            <b>USUARIO LOGUEADO CORRECTAMENTE</b>
                        </div>
                    </div>';

            $_SESSION["email"]=$usuarioIntro;
            $_SESSION["tipo_usuario"]= $tipoUserActual;
            $_SESSION["id_usuario"]= $idUsuarioActual;
            
            switch ($tipoUserActual) {
                case 'admin':
                    header("Location: menuAdmin.php");
                    exit;
                    break;

                case 'comprador':
                    header("Location: index.php");
                    exit;
                    break;

                case 'vendedor':
                    header("Location: index.php");
                    exit;
                    break;    

                default:
                    echo"Error de tipo de user";
                    break;
            }





        }else{
            echo    '<div class="d-flex justify-content-center">
                        <div class="alert alert-danger w-50 text-center" role="alert">
                            <b>El password es incorrecto</b>
                        </div>
                    </div>';
        }
        

        
    }else{
        echo    '<div class="d-flex justify-content-center">
                        <div class="alert alert-danger w-50 text-center" role="alert">
                            Este <b>USUARIO no existe</b> en la DataBase,<br><b>REGISTRESE</b>, o compruebe si lo ha introducido mal</b>
                        </div>
                    </div>';
    }

    if ($userEncontrado && $passwordCorrecta) {
        
    }



    mysqli_close($conexion);
}

?>
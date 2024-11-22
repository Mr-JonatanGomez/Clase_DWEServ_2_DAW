<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /* PARA QUITAR ESPACIOS Y POSIBLES ETIQUETAS
        tags    -> strip_tags
        spaces  -> trim
    */

    /* PARA VALIDAR EMAILS ETC...usamos el metodo  
    filter var, con parametros correro y filtro

        filter_var(correo, FILTER_VALIDATE_EMAIL
    */
    $correo =trim(strip_tags($_REQUEST["correo"])) ;
    $correo2 =trim(strip_tags($_REQUEST["correo2"]));
    $respuesta = $_REQUEST["recibir"];

    $correoOK = false;
    $correoOK2 = false;
    $recibirOk = false;

    if ($correo != $correo2) {
        echo("Lo siento, los correos <b>no coinciden</b>");
    }else if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        echo("El correo no ha superado la validacion");
    }else{
        $correoOK=true;
        
    }
    
    
    
    if ($respuesta==-1){
        echo("No ha indicado si quiere recibir newsletter");

    }else if($respuesta == 0||$respuesta == 1){
        $recibirOk= true;
    }

    if ($correoOK && $recibirOk) {
        echo("<br>Su correo electronico es $correo <br>");
        switch ($respuesta) {
            case '0':
                echo("<b>NO</b> rebiriá la newsletter");
                break;

            case '1':
                echo("<b>SÍ</b> recibira la newsletter");
                break;
            
            default:
                # code...
                break;
        }
    }
    
    
    
    
    
    
    
    
    
    ?>
</body>
</html>
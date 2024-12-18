<!-- Se puede usar Exceptions igual que en java
 
    para controlar por ejemplo el numero de usuarios conectados a una APP

-->

<?php

/* $miLado = -7;
function area($lado){
    if($lado<=0){
        # lanzamos exception
        throw new Exception("Error no puede haber lado 0 o menos en un cuadrado");
        
    }else{
        echo "El area de su cuadrado con lado de $lado, es de: ".$lado*$lado."<br>";
    return $lado*$lado;
    }
}
echo"<br> COMO NO HEMOS CAPTURADO SALTARA EL UNCAUGHT, DETENIENDO<br><br><br>";
area($miLado); */

?>

<?php
$misLado = [-7,5,0,9];
function area($lado){
    if($lado<=0){
        # lanzamos exception
        throw new Exception("Error no puede haber lado 0 o menos en un cuadrado");
        
    }else{
        echo "El area de su cuadrado con lado de $lado, es de: ".$lado*$lado."<br>";
    return $lado*$lado;
    }
}
foreach ($misLado as $ladoIndiv) {
    
    try {
        area($ladoIndiv);
    } catch (Exception $e) {
        echo"hubo una exception". $e->getMessage()."<br>";
    }
}



?>


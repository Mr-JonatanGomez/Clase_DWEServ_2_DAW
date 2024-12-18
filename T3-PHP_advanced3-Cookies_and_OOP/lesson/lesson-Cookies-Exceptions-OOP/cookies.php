<!-- 
en PHP creamos cookies con la funtion 
setcookie("nombreCookie", "valorCookie") 
-->
<?php

#EJEMPLO COOKIE SENCILLO
setcookie("nombre", "juancho", time()+10);
# la cookie juancho dura +10 segundos 

# PHP recibe las cookies en un un array $_COOKIE que almacena nombre y valor
if (isset($_COOKIE["nombre"])) {
    
    echo "su nombre almacenado en cookie es $_COOKIE[nombre]";
}else{
    echo " No hay nombre en la cookie, o no existe ésta";
}
?>

<?php

class Coche{
    public $marca;
    public $color;
    public $modelo;




    /* para sacar los atributos creamos la funtion getter */
    public function getColor(){
        return $this->color;
    }
    #CONSTRUCTOR

    public function __construct($marca,$color,$modelo) {
        $this->marca = $marca;
        $this->color = $color;
        $this->modelo = $modelo;  
    }
}

$miCoche = new Coche("opel","blanco","corsa");



/* GENERAR SUS ATRIBUTOS SIN CONSTRUCTOR */
$miCoche->color="blanco";
/* $miCoche->propietario="Jonatan"; */


echo "Mi coche es de color ". $miCoche->getColor()."<br>";

echo " EN PHP Existe el PDO, es una biblioteca de objetos utilizables<br>\n"


?>


//todo COMPROBAR SI SQLite esta activado <br>

<?php
if (extension_loaded('sqlite3')) {
    echo "SQLite3 está habilitado";
} else {
    echo "SQLite3 no está habilitado";
}
?>


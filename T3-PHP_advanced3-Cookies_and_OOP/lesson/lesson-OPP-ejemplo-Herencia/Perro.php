<?php
/* include_once "Animal.php"; */

class Perro extends Animal{
    public $nombre;
    public $colorPrincipal;
    

    public function __construct($sexo, $especie,$nombre, $colorPrincipal ) {
        // Llamar al constructor de la clase padre
        parent::__construct($sexo, $especie);
        $this->nombre = $nombre;
        $this->colorPrincipal = $colorPrincipal;
    }

    public function ladrar() {
        return "Guauuu, Guauuuu!";
      }
}




?>
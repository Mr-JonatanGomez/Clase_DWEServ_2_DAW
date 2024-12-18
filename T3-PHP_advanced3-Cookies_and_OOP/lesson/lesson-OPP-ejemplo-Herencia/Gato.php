<?php
/* include_once "Animal.php"; */

class Gato extends Animal{
    public $nombre;
    public $colorPrincipal;
    

    public function __construct($sexo, $especie,$nombre, $colorPrincipal ) {
        // Llamar al constructor de la clase padre
        parent::__construct($sexo, $especie);
        $this->nombre = $nombre;
        $this->colorPrincipal = $colorPrincipal;
    }

    public function __toString(){
        #return del toSt de padre, concat con el nuevo
        return parent::__toString(). "\nEl nombre del susodicho animal es $this->nombre.<br>Sus colores principales son $this->colorPrincipal.<br> " ;
    }

    public function treparArbol() {
        return "Estoy trepando un arbol<br>";
      }
}




?>
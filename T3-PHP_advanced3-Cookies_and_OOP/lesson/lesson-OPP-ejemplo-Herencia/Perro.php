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

public function __toString(){
    return parent::__toString()."El nombre de este adorable animal es $this->nombre<br>
    El color principal de su pelaje es $this->colorPrincipal<br>";
}

    public function ladrar() {
        return "Guauuu, Guauuuu!<br>";
      }
}




?>
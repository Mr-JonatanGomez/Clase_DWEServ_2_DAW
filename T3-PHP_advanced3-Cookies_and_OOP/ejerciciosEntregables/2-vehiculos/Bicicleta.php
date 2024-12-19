<?php
class Bicicleta extends Vehiculo{
    public $numMarchas;



    public function __construct($nombre, $numMarchas){
        parent::__construct($nombre);
        $this->numMarchas = $numMarchas;
    }

    public function hacerCaballito(){
        echo" haciendo caballitos";
    }
}



?>
<?php
class Coche extends Vehiculo{
    public $cilindrada;



    public function __construct($nombre,$cilindrada) {
        parent::__construct($nombre);
        $this->cilindrada = $cilindrada; 
    }

    public function quemarRuedas(){
        echo "quemando ruedasssssssss... 🏎🚗".$this->nombre."...... ooooohh, Ruedas quemadas";
    }

}


?>
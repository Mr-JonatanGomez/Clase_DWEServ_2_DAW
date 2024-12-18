<?php
class Animal{
    private $sexo;
    public $especie;


public function __construct($sexo, $especie) {
    $this->sexo = $sexo;
    $this->especie = $especie;
}

public function __toString(){
    return "La raza de este animal es $this->especie.<br>El sexo de este animal es $this->sexo. <br>" ;
}

public function comer($comida){
return "Estoy comiendo un paredado de $comida";
}
public function dormir(){
    return "zzzzzzzzz";
}



#GETTER

public function getRaza(){
    return $this->especie;
}
public function getSexo(){
    return $this->sexo;
}


}

?>
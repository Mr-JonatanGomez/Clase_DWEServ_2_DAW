<?php
class Vehiculo{

    public $nombre;
    public static $Kms_totales=0;
    public static $vehiculosCreados=0;
    public $km_recorridos;

    public function __construct($nombre) {
        self::$vehiculosCreados++; #auto increment a si mismo al usar el construct
        $this->km_recorridos = 0;
        $this->nombre = $nombre;

    
        
        
    }
    public static function getVehiculosCreados(){
        return "Hay un total de ". self::$vehiculosCreados." vehiculos creados ";
    }

    public static function getKmTotalVehiculos(){
        return "Los kilometros recorridos entre todos los vehiculos son ".self::$Kms_totales;
    }

    public function getKmRecorridos(){
        return "Los kilometros recorridos por ".$this->nombre." han sido ".$this->km_recorridos;
        #aqui quiero que ademas delos km me diga que vehiculo es

        }

    public function recorrer($km){
        $this->km_recorridos+=$km;
        self::$Kms_totales+=$km;

    }

}

?>
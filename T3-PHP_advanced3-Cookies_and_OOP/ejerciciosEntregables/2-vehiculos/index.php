<?php
spl_autoload_register(function ($class) {
    include_once $class . '.php';
});


$coche1 = new Coche("Coche1",150);
$coche2 = new Coche("Coche2",80);
$coche3 = new Coche("Coche3",350);
$bici1 = new Bicicleta("Bici1",36);
$bici2 = new Bicicleta("Bici2",1);
$bici3 = new Bicicleta("Bici3",18);


$bici3->recorrer(19);
$coche2->recorrer(45);
$coche1->recorrer(136);
$bici2->recorrer(74);


echo $coche1->getKmRecorridos()."<br>";
echo $coche2->getKmRecorridos()."<br>";
echo $coche3->getKmRecorridos()."<br>";
$coche3->quemarRuedas();
echo "<br>";
echo $bici1->getKmRecorridos()."<br>";
echo $bici2->getKmRecorridos()."<br>";
echo $bici3->getKmRecorridos()."<br><br>";

echo Vehiculo::getKmTotalVehiculos()."<br>";
echo Vehiculo::getVehiculosCreados()."<br>";



?>
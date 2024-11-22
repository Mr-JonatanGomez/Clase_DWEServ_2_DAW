<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //ARRAY MULTI

    /* 
    emplo posiciones
    0-0 Camello
    0-1 camello.svg
    0-2 https://es.wikipedia.org/wiki/Camelus
    1-0 Jirafa
    */
    $animales = [
        ["Camello", "camello.svg", "https://es.wikipedia.org/wiki/Camelus"],
        ["Elefante", "elefante.svg", "https://es.wikipedia.org/wiki/Elephantidae"],
        ["Jirafa", "jirafa.svg", "https://es.wikipedia.org/wiki/Giraffa_camelopardalis"],
        ["Oso", "oso.svg", "https://es.wikipedia.org/wiki/Ursidae"],
        ["Pájaro", "pajaro.svg", "https://es.wikipedia.org/wiki/Aves"],
        ["tigre", "tigre.svg", "https://es.wikipedia.org/wiki/Panthera_tigris"],
        ["Mono", "mono.svg", "https://es.wikipedia.org/wiki/Mono"],
        ["medusa", "medusa.svg", "https://es.wikipedia.org/wiki/Medusozoa"]
    ];
    
    $filaAnimal = rand(0, count($animales) - 1);
    
    // Con esto sacamos  dentro de animales la [fila] y la posicion
    print "  <br>" . $animales[$filaAnimal][0] . "<br>\n";

    print "  <p><img src='./exercises-T2/img/{$animales[$filaAnimal][1]}' height=100></p>\n";

    print "  <p>Más <a href='{$animales[$filaAnimal][2]}'>información sobre este animal</a> en la Wikipedia</p>\n";
    
    
    
    
    
    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El juego de los dados</title>
    <link rel="stylesheet" href="./style.css">
   
</head>
<body>
    
    <h2>El juego de los dados</h2>
    <div class="tablero">
        <?php
        //todo meter script para nombre de jugadores
        $numeroRondas=5;
        $jugador1="Jonatan";
        $jugador2="Jose Manuel";
        $puntosJ1=0;
        $puntosJ2=0;
        $arrayPuntosJ1= [];/* Array para la tabla */
        $arrayPuntosJ2= [];


        echo "<div id='juego'>JUEGO DE LOS DADOS</div>";
        ?>


        <div class="jugador1-cont">
            <?php
            //echo '<div id="jugador1">$juga</div>';
                echo "<div id='jug1'>$jugador1</div>";
        
                echo "<div id= 'dadoPosition1'>";
                for ($i=0; $i <$numeroRondas ; $i++) { 
                    $dado= rand(1,6); 
                    $arrayPuntosJ1[$i]=$dado; 
                    print "<img src='./img/$dado.png' width=70 height=70/>";
                    $puntosJ1+= $dado;
                
                }
                echo "</div>";
                
            
            ?>
        </div>
        <div class="jugador2-cont">
            <?php
                
                echo "<div id='jug2'>$jugador2</div>";
            
                
                echo "<div id= 'dadoPosition2'>";
                for ($i=0; $i <5 ; $i++) { 
                    $dado= rand(1,6);
                    $arrayPuntosJ2[$i]=$dado; 
                    print "<img src='./img/$dado.png' width=70 height=70/>";
                    $puntosJ2+= $dado;
                    
                }

                echo "</div>";
                ?>
        </div>  
      
        


    </div>
    <div class="resultados">
    <h4>RESULTADOS</h4>

        <table id="table">
            <tr>
                <td>JUGADORES</td>
                <td>R1</td>
                <td>R2</td>
                <td>R3</td>
                <td>R4</td>
                <td>R5</td>
                <td>TOTAL</td>
            </tr>
            <?php
                $colorJ1= $puntosJ1 > $puntosJ2 ? 'rgb(167, 247, 151)' : ($puntosJ1 < $puntosJ2 ? 'rgb(247, 151, 151)' : 'white');
                $colorJ2= $puntosJ2 > $puntosJ1 ? 'rgb(167, 247, 151)' : ($puntosJ2 < $puntosJ1 ? 'rgb(247, 151, 151)' : 'white');
                
                echo"<tr>";
                echo "<td><b>$jugador1</b></td>";
                echo "<td>{$arrayPuntosJ1[0]}</td>";
                echo "<td>{$arrayPuntosJ1[1]}</td>";
                echo "<td>{$arrayPuntosJ1[2]}</td>";
                echo "<td>{$arrayPuntosJ1[3]}</td>";
                echo "<td>{$arrayPuntosJ1[4]}</td>";
                echo "<td style='background-color : $colorJ1'>$puntosJ1</td>";
                echo "</tr>";
                
                echo"<tr>";
                echo "<td><b>$jugador2</b></td>";
                echo "<td>{$arrayPuntosJ2[0]}</td>";
                echo "<td>{$arrayPuntosJ2[1]}</td>";
                echo "<td>{$arrayPuntosJ2[2]}</td>";
                echo "<td>{$arrayPuntosJ2[3]}</td>";
                echo "<td>{$arrayPuntosJ2[4]}</td>";
                echo "<td style='background-color : $colorJ2'>$puntosJ2</td>";
                echo "</tr>";
        // usamos ternario para color



        ?>
        </table>

    <?php
        echo "<div class='result'>";
            print "<p><b>$jugador1</b> ha obtenido $puntosJ1 puntos</p>";
            print "<p><b>$jugador2</b> ha obtenido $puntosJ2 puntos</p>";

            if ($puntosJ1 > $puntosJ2) {
                print "<p><b>El ganador ha sido $jugador1 con una diferencia de ".$puntosJ1-$puntosJ2 ." puntos</b></p>";
            }elseif ($puntosJ1 < $puntosJ2) {
                print "<p><b>El ganador ha sido $jugador2 con una diferencia de ".$puntosJ2-$puntosJ1 ." puntos</b></p>";
            }else{
                print "<p><b>La partida ha finalizado con empate</b></p>";
            }
        echo "</div>";

    ?>  
    </div>


      
    
</body>
</html>

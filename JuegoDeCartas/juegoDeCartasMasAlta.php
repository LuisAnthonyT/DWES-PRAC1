<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Cartas más altas ganan</title>
</head>
<body>
    
    
    <?php 
        include_once('inc/nav.inc.php');
    ?>  

    <h1>Juego de cartas más alta</h1>
    <h2>Luis Anthony Toapanta Bolaños</h2>
    
    <?php 
        //ARRAY CON CARTAS DE LA BARAJA FRANCESA
        $deck = [
            //CORAZONES <3

            ["suit" => "corazones", "value" => "1", "image" => "img/baraja/cor_1.png"],
            ["suit" => "corazones", "value" => "2", "image" => "img/baraja/cor_2.png"],
            ["suit" => "corazones", "value" => "3", "image" => "img/baraja/cor_3.png"],
            ["suit" => "corazones", "value" => "4", "image" => "img/baraja/cor_4.png"],
            ["suit" => "corazones", "value" => "5", "image" => "img/baraja/cor_5.png"],
            ["suit" => "corazones", "value" => "6", "image" => "img/baraja/cor_6.png"],
            ["suit" => "corazones", "value" => "7", "image" => "img/baraja/cor_7.png"],
            ["suit" => "corazones", "value" => "8", "image" => "img/baraja/cor_8.png"],
            ["suit" => "corazones", "value" => "9", "image" => "img/baraja/cor_9.png"],
            ["suit" => "corazones", "value" => "10", "image" => "img/baraja/cor_10.png"],
            ["suit" => "corazones", "value" => "11", "image" => "img/baraja/cor_j.png"],
            ["suit" => "corazones", "value" => "12", "image" => "img/baraja/cor_k.png"],
            ["suit" => "corazones", "value" => "13", "image" => "img/baraja/cor_q.png"],

            //DIAMANTES            
            ["suit" => "diamantes", "value" => "1", "image" => "img/baraja/rom_1.png"],
            ["suit" => "diamantes", "value" => "2", "image" => "img/baraja/rom_2.png"],
            ["suit" => "diamantes", "value" => "3", "image" => "img/baraja/rom_3.png"],
            ["suit" => "diamantes", "value" => "4", "image" => "img/baraja/rom_4.png"],
            ["suit" => "diamantes", "value" => "5", "image" => "img/baraja/rom_5.png"],
            ["suit" => "diamantes", "value" => "6", "image" => "img/baraja/rom_6.png"],
            ["suit" => "diamantes", "value" => "7", "image" => "img/baraja/rom_7.png"],
            ["suit" => "diamantes", "value" => "8", "image" => "img/baraja/rom_8.png"],
            ["suit" => "diamantes", "value" => "9", "image" => "img/baraja/rom_9.png"],
            ["suit" => "diamantes", "value" => "10", "image" => "img/baraja/rom_10.png"],
            ["suit" => "diamantes", "value" => "11", "image" => "img/baraja/rom_j.png"],
            ["suit" => "diamantes", "value" => "12", "image" => "img/baraja/rom_k.png"],
            ["suit" => "diamantes", "value" => "13", "image" => "img/baraja/rom_q.png"],

            //PICAS
            ["suit" => "espadas", "value" => "1", "image" => "img/baraja/pic_1.png"],
            ["suit" => "espadas", "value" => "2", "image" => "img/baraja/pic_2.png"],
            ["suit" => "espadas", "value" => "3", "image" => "img/baraja/pic_3.png"],
            ["suit" => "espadas", "value" => "4", "image" => "img/baraja/pic_4.png"],
            ["suit" => "espadas", "value" => "5", "image" => "img/baraja/pic_5.png"],
            ["suit" => "espadas", "value" => "6", "image" => "img/baraja/pic_6.png"],
            ["suit" => "espadas", "value" => "7", "image" => "img/baraja/pic_7.png"],
            ["suit" => "espadas", "value" => "8", "image" => "img/baraja/pic_8.png"],
            ["suit" => "espadas", "value" => "9", "image" => "img/baraja/pic_9.png"],
            ["suit" => "espadas", "value" => "10", "image" => "img/baraja/pic_10.png"],
            ["suit" => "espadas", "value" => "11", "image" => "img/baraja/pic_j.png"],
            ["suit" => "espadas", "value" => "12", "image" => "img/baraja/pic_k.png"],
            ["suit" => "espadas", "value" => "13", "image" => "img/baraja/pic_q.png"],
 
            //TREBOLES
            ["suit" => "tréboles", "value" => "1", "image" => "img/baraja/tre_1.png"],
            ["suit" => "tréboles", "value" => "2", "image" => "img/baraja/tre_2.png"],
            ["suit" => "tréboles", "value" => "3", "image" => "img/baraja/tre_3.png"],
            ["suit" => "tréboles", "value" => "4", "image" => "img/baraja/tre_4.png"],
            ["suit" => "tréboles", "value" => "5", "image" => "img/baraja/tre_5.png"],
            ["suit" => "tréboles", "value" => "6", "image" => "img/baraja/tre_6.png"],
            ["suit" => "tréboles", "value" => "7", "image" => "img/baraja/tre_7.png"],
            ["suit" => "tréboles", "value" => "8", "image" => "img/baraja/tre_8.png"],
            ["suit" => "tréboles", "value" => "9", "image" => "img/baraja/tre_9.png"],
            ["suit" => "tréboles", "value" => "10", "image" => "img/baraja/tre_10.png"],
            ["suit" => "tréboles", "value" => "11", "image" => "img/baraja/tre_j.png"],
            ["suit" => "tréboles", "value" => "12", "image" => "img/baraja/tre_k.png"],
            ["suit" => "tréboles", "value" => "13", "image" => "img/baraja/tre_q.png"],

        ];

        //Array con nombres de jugadores Random
        $namesRandom = ["Luis", "Tomás", "Ana", "Juan", "Alejandro", "Pedro", "María", "Sofía", "Carlos", "Marta", "Elena", "Javier", "Andrés", "Carmen", "Isabel", "David", "Raúl", "Patricia", "Laura"];
        
        shuffle($namesRandom);
        $player1 = $namesRandom[0];
        $player2 = $namesRandom[1];


        //FUNCIÓN PARA REPARTIR CARTAS

        function distributeCards(array $deck) :array{
            shuffle($deck);
            for ($i = 0; $i < 10; $i++) {
                // Comprueba si hay cartas disponibles en el mazo
                if (count($deck) > 0) {
                    // Reparte una carta al jugador 
                    $card1 = array_shift($deck);
                    $arrayPlayer[] = $card1;
                }
            }
            return $arrayPlayer;
        }

         //Array para cada jugador
         $arrayPlayer1 = distributeCards($deck);
         $arrayPlayer2 = distributeCards($deck);


        //A PARTIR DE AQUI SE HACE LA COMPARACIÓN DE CARTAS DE CADA JUGADOR (solo hay una comparación, no es necesario una función)

        $score1 = 0;
        $score2 = 0;

            foreach($arrayPlayer1 as $card1){
                foreach($arrayPlayer2 as $card2){
                
                    if ($card1["value"] > $card2["value"]){
                        $score1 =+ 2;
                    }
                    else if ($card2["value"] > $card1["value"]){
                        $score2 =+ 2;
                    }
                    else{
                        $score1 = $score1 + 1;
                        $score2 = $score2 + 1;
                    }
                }
    
            }       

        // function compareCards (array $arrayPlayer1, array $arrayPlayer2):int {
        //     $score = 0;
        //     foreach($arrayPlayer1 as $card1){
        //         foreach($arrayPlayer2 as $card2){
        //             if($card1["value"] > $card2["value"]){
        //                 $score += 2;
        //             }
        //             else if ($card1["value"] == $card2["value"]){
        //                 $score +=1;
        //             }
        //         }
        //     }
        //     return $score;
        // }

        // $score1 = compareCards($arrayPlayer1,$arrayPlayer2);
        // $score2 = compareCards($arrayPlayer2,$arrayPlayer1);


       //PARTE USUARIO
       function printPlayer (string $player, array $arrayPlayer) {

            echo "<div class='container'>";
                echo "Jugador : <h3> $player </h3></br>";
                    foreach($arrayPlayer as $value){
                     echo "<img class='card' src='" . $value["image"] . "' alt=''>";
                    }
            echo "</div>";

        }

        printPlayer($player1,$arrayPlayer1);
        printPlayer($player2,$arrayPlayer2);


        //RESULTADOS
        echo "<div class='resultados'>";
                echo "<h3>Resultado de la partida:</h3>";
                    echo "$player1: $score1 </br>";
                    echo "$player2: $score2</br>";

                    if ($score1 > $score2){
                        echo "El ganador es: <strong>$player1</strong>";
                    } 
                    else if ($score2 > $score1){
                        echo "El ganador es: <strong>$player2</strong>";
                    } else {
                        echo "Empate entre los dos jugadores";
                    }
        echo "</div>";
    ?>    
</body>
</html>
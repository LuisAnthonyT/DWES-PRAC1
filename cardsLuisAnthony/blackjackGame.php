<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Juego de Blackjack</title>
</head>
<body>
    <?php 
        include_once('inc/nav.inc.php');
    ?>

        <h1>Juego de Blackjack</h1>
        <h2>Luis Anthony Toapanta Bolaños</h2>
    <?php 
         //ARRAY CON CARTAS DE LA BARAJA FRANCESA, J K Q VALEN 10 
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
            ["suit" => "corazones", "value" => "10", "image" => "img/baraja/cor_j.png"],
            ["suit" => "corazones", "value" => "10", "image" => "img/baraja/cor_k.png"],
            ["suit" => "corazones", "value" => "10", "image" => "img/baraja/cor_q.png"],

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
            ["suit" => "diamantes", "value" => "10", "image" => "img/baraja/rom_j.png"],
            ["suit" => "diamantes", "value" => "10", "image" => "img/baraja/rom_k.png"],
            ["suit" => "diamantes", "value" => "10", "image" => "img/baraja/rom_q.png"],

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
            ["suit" => "espadas", "value" => "10", "image" => "img/baraja/pic_j.png"],
            ["suit" => "espadas", "value" => "10", "image" => "img/baraja/pic_k.png"],
            ["suit" => "espadas", "value" => "10", "image" => "img/baraja/pic_q.png"],
 
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
            ["suit" => "tréboles", "value" => "10", "image" => "img/baraja/tre_j.png"],
            ["suit" => "tréboles", "value" => "10", "image" => "img/baraja/tre_k.png"],
            ["suit" => "tréboles", "value" => "10", "image" => "img/baraja/tre_q.png"],

            //AS
            ["suit" => "AS", "value" => "1", "image" => "img/baraja/jok_1.png"],
            ["suit" => "AS", "value" => "1", "image" => "img/baraja/jok_2.png"]

        ];

        //Array con nombres de jugadores Random
        $namesRandom = ["Luis", "Tomás", "Ana", "Juan", "Alejandro", "Pedro", "María", "Sofía", "Carlos", "Marta", "Elena", "Javier", "Andrés", "Carmen", "Isabel", "David", "Raúl", "Patricia", "Laura"];
        
        shuffle($namesRandom);
        $player0 = "Banca";
        $player1 = $namesRandom[0];
        $player2 = $namesRandom[1];
        $player3 = $namesRandom[2];
        $player4 = $namesRandom[3];
        $player5 = $namesRandom[4];

       

        //Función para rellenar el array de los jugadores
        function fillDeckPlayer (array $deck):array {
            shuffle($deck);

            for ($i = 0; $i < 2; $i++) {
                // Comprueba si hay cartas disponibles en el mazo
                if (count($deck) > 0) {
                    // Reparte una carta al jugador 
                    $card1 = array_shift($deck);
                    $deckPlayer[] = $card1;
                }
            }
            return $deckPlayer;
        }
        //Creamos los 5 mazos con la función de antes
        $deckPlayer0 = fillDeckPlayer($deck);
        $deckPlayer1 = fillDeckPlayer($deck);
        $deckPlayer2 = fillDeckPlayer($deck);
        $deckPlayer3 = fillDeckPlayer($deck);
        $deckPlayer4 = fillDeckPlayer($deck);
        $deckPlayer5 = fillDeckPlayer($deck);

         //CALCULO DE PUNTOS
        
        function total (array $deckPlayer , array $deck):int {
            $sum = 0;
            foreach ($deckPlayer as $card) {
                $sum += $card["value"];
                
            }
            
            return $sum;
        }

        $scoreBanca = total($deckPlayer0,$deck);
        $score1 = total($deckPlayer1,$deck);
        $score2 = total($deckPlayer2,$deck);
        $score3 = total($deckPlayer3,$deck);
        $score4 = total($deckPlayer4,$deck);
        $score5 = total($deckPlayer5,$deck);
        
        //CALCULO DE RESULTADOS
        function results (int $scoreBanca,int $scorePlayer):string {
                if($scorePlayer > 21){
                    return $result = "¡PIERDE!";
                }
                else if ($scorePlayer > $scoreBanca && $scorePlayer < 21) {
                    return $result = "¡GANA!";
                }
                else if ($scorePlayer < $scoreBanca && $scoreBanca > 21) {
                    return $result = "¡GANA!";
                }
                else {
                    return $result = 'EMPATE';
                }
        }
        $result1 = results($scoreBanca,$score1);
        $result2 = results($scoreBanca,$score2);
        $result3 = results($scoreBanca,$score3);
        $result4 = results($scoreBanca,$score4);
        $result5 = results($scoreBanca,$score5);

       
         //PARTE USUARIO

        function printCard (string $player, array $deckPlayer,int $score,string $result) {

             echo "<div class='blackjack'>";
                 echo "Jugador : <h3> $player </h3></br>";
                    foreach($deckPlayer as $value){
                        echo "<img class='card' src='" . $value["image"] . "' alt=''>";
                    }
                    echo "</br>";
                    echo "Puntos: $score</p>";
                    echo $result;
                 echo "</div>";

            }

       //BANCA --> A LA BANCA SE LE APLICA ESTILOS DIFERENTES
        echo "<div class='banca'>";
                 echo "Jugador : <h3> $player0 </h3></br>";
                    foreach($deckPlayer0 as $value){
                        echo "<img class='card' src='" . $value["image"] . "' alt=''>";
                    }
                    echo "</br>";
                    echo "Puntos: $scoreBanca";
                 echo "</div>";
                 
        //JUGADORES
        echo "<div class='containerBlackjack'>";
            printCard($player1,$deckPlayer1,$score1,$result1);
            printCard($player2,$deckPlayer2,$score2,$result2);
            printCard($player3,$deckPlayer3,$score3,$result3);
            printCard($player4,$deckPlayer4,$score4,$result4);
            printCard($player5,$deckPlayer5,$score5,$result5);   
        echo "</div>" 

    ?>
    
</body>
</html>
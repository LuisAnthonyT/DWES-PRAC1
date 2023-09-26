<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/style.css">
    <title>Juego de Blackjack</title>
</head>
<body>
    <h1>Juego de Blackjack</h1>
    <h2>Luis Anthony Toapanta Bolaños</h2>
    <?php 
        include_once('inc/nav.inc.php');
    ?>
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

        shuffle($deck);
        //Array con nombres de jugadores Random
        $namesRandom = ["Luis", "Tomás", "Ana", "Juan", "Alejandro", "Pedro", "María", "Sofía", "Carlos", "Marta", "Elena", "Javier", "Andrés", "Carmen", "Isabel", "David", "Raúl", "Patricia", "Laura"];
        
        shuffle($namesRandom);
        $player0 = "Banca";
        $player1 = $namesRandom[0];
        $player2 = $namesRandom[1];
        $player3 = $namesRandom[2];
        $player4 = $namesRandom[3];
        $player5 = $namesRandom[4];

        $array1= [];
        $array2= [];
        $array3= [];
        $array4= [];
        $array5= [];

        for ($i = 0; $i < 2; $i++) {
            // Comprueba si hay cartas disponibles en el mazo
            if (count($deck) > 0) {
                // Reparte una carta al jugador 
                $card1 = array_shift($deck);
                $arrayPlayer1[] = $card1;
            }
        }

        for ($i = 0; $i < 2; $i++) {
            // Comprueba si hay cartas disponibles en el mazo
            if (count($deck) > 0) {
                // Reparte una carta al jugador 
                $card1 = array_shift($deck);
                $arrayPlayer2[] = $card1;
            }
        }

        for ($i = 0; $i < 2; $i++) {
            // Comprueba si hay cartas disponibles en el mazo
            if (count($deck) > 0) {
                // Reparte una carta al jugador 
                $card1 = array_shift($deck);
                $arrayPlayer3[] = $card1;
            }
        }

        for ($i = 0; $i < 2; $i++) {
            // Comprueba si hay cartas disponibles en el mazo
            if (count($deck) > 0) {
                // Reparte una carta al jugador 
                $card1 = array_shift($deck);
                $arrayPlayer4[] = $card1;
            }
        }

        for ($i = 0; $i < 2; $i++) {
            // Comprueba si hay cartas disponibles en el mazo
            if (count($deck) > 0) {
                // Reparte una carta al jugador 
                $card1 = array_shift($deck);
                $arrayPlayer5[] = $card1;
            }
        }

         //PARTE USUARIO

        echo '<div class="blackjack">';
         echo "<div class='container'>";
             echo "Jugador 1: <h3> $player1 </h3></br>";
                foreach($arrayPlayer1 as $value){
                    echo "<img src='" . $value["image"] . "' alt=''>";
                }
        echo "</div>";

        echo "<div class='container'>";
            echo "Jugador 2: <h3> $player2 </h3></br>";
                foreach($arrayPlayer2 as $value){
                     echo "<img src='" . $value["image"] . "' alt=''>";
                }
        echo "</div>";

        echo "<div class='container'>";
            echo "Jugador 3: <h3> $player3 </h3></br>";
                foreach($arrayPlayer3 as $value){
                     echo "<img src='" . $value["image"] . "' alt=''>";
                }
        echo "</div>";

        echo "<div class='container'>";
            echo "Jugador 4: <h3> $player4 </h3></br>";
                foreach($arrayPlayer2 as $value){
                     echo "<img src='" . $value["image"] . "' alt=''>";
                }
        echo "</div>";

        echo "<div class='container'>";
            echo "Jugador 5: <h3> $player2 </h3></br>";
                foreach($arrayPlayer2 as $value){
                     echo "<img src='" . $value["image"] . "' alt=''>";
                }
        echo "</div>";


    ?>
    
</body>
</html>